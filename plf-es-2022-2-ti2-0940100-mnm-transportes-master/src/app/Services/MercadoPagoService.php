<?php

namespace App\Services;

use App\Models\Servico;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;
use Exception;

class MercadoPagoService
{
    const MERCADO_PAGO_URL = "https://api.mercadopago.com";

    public function __construct()
    {
        SDK::setAccessToken(env('mercado_pago_access_token'));
    }

    private function getAmount($money)
    {
        $cleanString = preg_replace('/([^0-9\.,])/i', '', $money);
        $onlyNumbersString = preg_replace('/([^0-9])/i', '', $money);

        $separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;

        $stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
        $removedThousandSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '',  $stringWithCommaOrDot);

        return (float) str_replace(',', '.', $removedThousandSeparator);
    }

    public function createPreference(Servico $servico)
    {
        try {
            $preference = new Preference();

            $item = new Item();
            $item->title = "Transporte ".$servico->id;
            $item->quantity = 1;
            $item->unit_price = $this->getAmount($servico->valor_final);
            $preference->items = [$item];

            $preference->back_urls = [
                'success' => env('app_url')."/servico/".$servico->id."?mnm_status=success",
                'pending' => env('app_url')."/servico/".$servico->id."?mnm_status=pending",
                'failure' => env('app_url')."/servico/".$servico->id."?mnm_status=failure",
            ];

            $preference->external_reference = $servico->id;

            $preference->save();

            if(str_contains(env('MERCADO_PAGO_ACCESS_TOKEN'), 'TEST')) {
                return $preference->sandbox_init_point;
            }

            return $preference->init_point;

        } catch (Exception $exception) {
            info($exception->getMessage());
            return null;
        }
    }

    /**
     * @throws GuzzleException
     */
    protected function constarPagamento(string $collectionId, string $servicoId): void
    {
        $servico = Servico::find($servicoId);
        $client = new Client(['base_uri' => self::MERCADO_PAGO_URL]);

        $response = $client->request('GET', "/v1/payments/$collectionId", [
            'headers' => [
                'Authorization' => 'Bearer '.SDK::getAccessToken()
            ]
        ]);

        $response = json_decode((string) $response->getBody(), true);

        $servico->status_pagamento = $response['status'] === "approved" ? 'paid' : 'pending';
        $servico->data_servico_pago = Carbon::now();
        $servico->save();
    }
}
