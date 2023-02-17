<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\FuncionarioServico;
use App\Models\Orcamento;
use App\Models\Servico;
use App\Services\MercadoPagoService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

class ServicosController extends MercadoPagoService
{
    public function cadastrarServico(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'endereco_retirada' => 'required',
            'endereco_entrega' => 'required',
            'data' => 'required',
            'quantidade_itens' => 'required',
        ]);

        $data = $request->all();
        $data['data'] = Carbon::parse($data['data'])->format('d/m/Y');

        $servico = Servico::create($data);
        return Response::json([$servico]);
    }

    public function retornarServico($id)
    {
        if (!$servico = Servico::find($id)) {
            return Response::json([
                'status' => 'error',
                'message' => 'Não foi possível encontrar o serviço solicitado.'
            ], 404);
        }

        return Response::json([$servico]);
    }

    public function avaliarServico($id, Request $request)
    {
        if (!Servico::find($id)) {
            return Response::json([
                'status' => 'error',
                'message' => 'Não foi possível encontrar o serviço solicitado.'
            ], 404);
        }

        $request->validate([
            'cliente_id' => 'required',
            'nota' => 'integer|required'
        ]);

        $data = [
            'servico_id' => $id,
            'cliente_id' => $request->input('cliente_id'),
            'nota' => $request->input('nota'),
            'comentario' => $request->input('comentario') ?? ""
        ];

        if (!Avaliacao::create($data)) {
            return Response::json([
                'status' => 'error',
                'message' => 'Erro ao registrar avaliação.'
            ], 500);
        }

        return Response::json([
            'status' => 'ok',
            'message' => 'Avaliação registrada com sucesso!'
        ]);
    }

    public function finalizarServico($id)
    {
        if (!$servico = Servico::find($id)) {
            return Response::json([
                'status' => 'error',
                'message' => 'Não foi possível encontrar o serviço solicitado.'
            ], 404);
        }

        $servico->servico_completo = true;
        $servico->data_servico_finalizado = Carbon::now();

        if (!$servico->save()) {
            return Response::json([
                'status' => 'error',
                'message' => 'Ocorreu um erro ao completar serviço.'
            ], 500);
        }

        return Response::json([
            'status' => 'success',
            'message' => 'Serviço completo com sucesso!'
        ]);
    }

    public function aceitarProposta($servicoId, Request $request)
    {
        if(! $servico = Servico::find($servicoId)) {
            return Response::json([
                'status' => 'error',
                'message' => 'Serviço não encontrado'
            ], 422);
        }

        $request->validate([
            'valor_proposta' => 'required'
        ]);

        $proposta = $request->input('valor_proposta');
        $servico->valor_final = $proposta;

        $orcamento = Orcamento
            ::where('servico_id', $servico->id)
            ->where('proposta', $proposta)
            ->first();

        $orcamento->aceita = true;

        if (! $orcamento->save()) {
            return Response::json([
                'status' => 'error',
                'message' => 'Erro ao salvar orçamento.'
            ], 500);
        }

        if (! $servico->save()) {
            return Response::json([
                'status' => 'error',
                'message' => 'Erro ao salvar proposta.'
            ], 500);
        }

        return Response::json([
            'status' => 'ok',
            'message' => 'Proposta aceita com sucesso!',
            'preference' => $this->createPreference($servico)
        ]);
    }

    public function cancelarServico(Servico $servico, Request $request)
    {
        $request->validate([
            'cancel_by' => 'required'
        ]);

        if ($request->input('cancel_by') == 'transportadora') {
            $servico->transportadora_id = null;
            $servico->valor_proposta = null;
            $servico->valor_final = null;
            $servico->servico_completo = false;
            $servico->status_pagamento = 'pending';

            if (! Orcamento::where('servico_id', $servico->id)->delete()) {
                return Response::json([
                    'status' => 'error',
                    'message' => 'Erro ao cancelar orçamentos!'
                ], 500);
            }

            if (! FuncionarioServico::where('servico_id', $servico->id)->delete()) {
                return Response::json([
                    'status' => 'error',
                    'message' => 'Erro ao remover funcionários do serviço!'
                ], 500);
            }

            if (! $servico->save()) {
                return Response::json([
                    'status' => 'error',
                    'message' => 'Erro ao cancelar serviço!'
                ], 500);
            }

            return Response::json([
                'status' => 'success',
                'message' => 'Serviço cancelado com sucesso!'
            ]);
        }

        if (! $servico->delete()) {
            return Response::json([
                'status' => 'error',
                'message' => 'Erro ao cancelar serviço!'
            ], 500);
        }

        return Response::json([
            'status' => 'success',
            'message' => 'Serviço cancelado com sucesso!'
        ]);
    }
}
