<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Servico;
use App\Services\MercadoPagoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends MercadoPagoService
{
    public function loginCliente()
    {
        if (Auth::check()) {
            return redirect('/painel');
        }

        return view('cliente.login');
    }

    public function cadastroCliente()
    {
        if (Auth::check()) {
            return redirect('/painel');
        }

        return view('cliente.cadastro');
    }

    public function deslogar()
    {
        auth()->guard('web')->logout();
        auth()->guard('transportadoras')->logout();
        return redirect()->route('login');
    }

    public function painel()
    {
        if(isset(auth()->user()->cpf)) {
            $user = auth()->user();

            return view('cliente.dashboard.dashboard', [
                'servicosCompletos' => $user->servicos()->where('servico_completo', true)->paginate(7),
                'servicosIncompletos' => $user->servicos()->where('servico_completo', false)->paginate(7),
                'avaliacoes' => $user->avaliacoes()->paginate(7)
            ]);
        }


        $transportadora = auth()->user();

        return view('transportadora.dashboard.dashboard', [
            'servicos'=> Servico::whereNull('transportadora_id')->paginate(7),
            'servicosCompletos'=> $transportadora->servicos()->where('servico_completo', true)->paginate(7),
            'servicosIncompletos'=> $transportadora->servicos()->where('servico_completo', false)->paginate(7),
            'avaliacoes'=> $transportadora->avaliacoes()
        ]);
    }

    public function cadastrarServico()
    {
        return view('cliente.servicos.cadastrar');
    }

    public function visualizarServico($id, Request $request)
    {
        if(! $servico = Servico::find($id)) {
            return redirect()->route('dashboard.painel');
        }

        $handler = [];

        if($servico->valor_final && $servico->status_pagamento !== 'success') {
            $handler = [
                'status' => 'error',
                'message' => 'Atenção, o orçamento foi aprovado, mas você ainda não efetuou o pagamento.',
                'preference' => $this->createPreference($servico)
            ];
        }

        if ($request->input('collection_id') && $request->input('external_reference')) {
            $this->constarPagamento(
                $request->input('collection_id'),
                $request->input('external_reference')
            );
        }


        if($request->input('mnm_status') && $request->input('mnm_status') !== 'success') {
            $handler['status'] = 'error';
            $handler['message'] = "Atenção, o Pagamento do serviço não foi concluído, certifique-se de efetuar o pagamento corretamente para que a Transportadora faça a mudança.";
            $handler['preference'] = $this->createPreference($servico);

        } elseif($request->input('mnm_status') && $request->input('mnm_status') === 'success') {
            $handler = [
                'status' => 'success',
                'message' => 'Pagamento efetuado com sucesso'
            ];
        }

        return $servico->cliente_id != auth()->user()->id ? redirect()->route('dashboard.painel') : view('cliente.servicos.servico', [
            'servico' => $servico,
            'transportadora' => $servico->transportadora(),
            'handler' => $handler,
            'orcamentos' => $servico->orcamentos()->orderBy('id', 'DESC')->paginate(7),
            'ultimoOrcamento' => $servico->orcamentos()->latest('created_at')->first(),
            'entregadores' => $servico->entregadores(),
            'cliente' => Cliente::find($servico->cliente_id)
        ]);
    }

    public function loginTransportadora()
    {
        if (auth()->check()) {
            return redirect('/painel');
        }

        return view('transportadora.login');
    }

    public function cadastroTransportadora()
    {
        if (Auth::check()) {
            return redirect('/painel');
        }

        return view('transportadora.cadastro');
    }

    public function funcionarios(Request $request)
    {
        $entregadores = auth()->user()->entregadores();

        if ($request->input('search')) {
            $entregadores->where('nome', 'LIKE', "%".$request->input('search')."%");
        }

        return view('transportadora.funcionario.funcionarios', [
            'funcionarios' => $entregadores->paginate(7)
        ]);
    }

    public function visualizarServicoTransportadora(Servico $servico)
    {
        if($servico->transportadora_id !== null &&
            $servico->transportadora_id !== auth()->user()->id) {

            return redirect()->route('dashboard.painel');
        }

        return view('transportadora.servico.servico', [
            'servico' => $servico,
            'cliente' => $servico->cliente(),
            'transportadora' => $servico->transportadora(),
            'funcionarios' => auth()->user()->entregadores()->get(),
            'orcamentos' => $servico->orcamentos()->orderBy('id', 'DESC')->paginate(7),
            'ultimoOrcamento' => $servico->orcamentos()->latest('created_at')->first(),
            'entregadores' => $servico->entregadores()
        ]);
    }
}
