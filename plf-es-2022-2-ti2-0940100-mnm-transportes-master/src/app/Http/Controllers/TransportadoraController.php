<?php

namespace App\Http\Controllers;

use App\Models\Entregador;
use App\Models\FuncionarioServico;
use App\Models\Orcamento;
use App\Models\Servico;
use App\Models\Transportadora;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class TransportadoraController extends Controller
{
    public function cadastrarTransportadora(Request $request){
        $request->validate([
            'cnpj' => 'required|unique:transportadoras',
            'telefone' => 'required',
            'email_transportadora' => 'required|unique:transportadoras',
            'nome_transportadora' => 'required',
            'senha' => 'required',
        ]);

        $data = [
            'cnpj' => $request->input('cnpj'),
            'senha' => Hash::make($request->input('senha')),
            'telefone' => $request->input('telefone'),
            'nome_transportadora' => $request->input('nome_transportadora'),
            'email_transportadora' => $request->input('email_transportadora'),
        ];

        $transportadora = Transportadora::create($data);
        Auth::guard('transportadoras')->login($transportadora);

        return Response::json([$transportadora]);
    }

    public function cadastrarEntregador(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'transportadora_id' => 'required'
        ]);

        if (! $entregador = Entregador::create($request->only(['nome', 'transportadora_id']))) {
            return Response::json([
                'status' => 'error',
                'message' => 'Erro ao cadastrar entregador.'
            ], 500);
        }

        return Response::json([$entregador]);
    }

    public function retornarEntregadores($transportadoraId)
    {
        if(! $transportadora = Transportadora::find($transportadoraId)) {
            return Response::json([
                'status' => 'error',
                'message' => 'Transportadora não encontrada'
            ], 404);
        }

        $entregadores = $transportadora->entregadores()->get();

        return Response::json([$entregadores]);
    }

    public function retornarServicos($transportadoraId)
    {
        if(! $transportadora = Transportadora::find($transportadoraId)) {
            return Response::json([
                'status' => 'error',
                'message' => 'Transportadora não encontrada'
            ], 404);
        }

        $servicos = $transportadora->servicos()->get();

        return Response::json([$servicos]);
    }

    public function loginTransportadora(Request $request){
        $request->validate([
            "cnpj"=>"required",
            "senha"=>"required"
        ]);

        $cnpj = $request->input("cnpj");
        $senha = $request->input("senha");

        if (! $transportadora = Transportadora::where("cnpj", $cnpj)->first()){
            return Response::json([
                'status'=>'error', "message"=>"Transportadora não encontrada"
            ]);
        }

        if(! Hash::check($senha, $transportadora->senha)){
            return Response::json([
                'status'=>'error', "message"=>"Senha incorreta"
            ]);
        }

        Auth::guard('transportadoras')->login($transportadora);

        return redirect("/painel");
    }

    public function deletarEntregador(Entregador $entregador)
    {
        if (! $entregador->delete()) {
            return Response::json([
                'status' => 'error',
                'message' => 'Erro ao deletar entregador!'
            ], 500);
        }

        return Response::json([
            'status' => 'success',
            'message' => 'Entregador removido com sucesso!'
        ]);
    }

    public function fazerOrcamento(Servico $servico, Request $request)
    {
        $request->validate([
            'orcamento' => 'required',
            'transportadora_id' => 'required',
            'cliente_id' => 'required',
        ]);

        $servico->transportadora_id = $request->input('transportadora_id');
        $servico->valor_proposta = $request->input('orcamento');

        if (! Orcamento::create([
            'transportadora_id' => $request->input('transportadora_id'),
            'servico_id' => $servico->id,
            'cliente_id' => $request->input('cliente_id'),
            'proposta' => $request->input('orcamento'),
            'feita_por' => isset(auth()->user()->id) ? "Cliente" : "Transportadora"
        ])) {
            return Response::json([
                'status' => 'error',
                'message' => 'Erro ao fazer orçamento.'
            ], 500);
        };

        if(! isset(auth()->user()->id)) {
            if(! FuncionarioServico::create([
                'servico_id' => $servico->id,
                'funcionarios' => implode(',', $request->input('funcionarios'))
            ])) {
                return Response::json([
                    'status' => 'error',
                    'message' => 'Erro ao designar funcionários para o serviço.'
                ], 500);
            }
        }

        if (! $servico->save()) {
            return Response::json([
                'status' => 'error',
                'message' => 'Erro ao fazer proposta.'
            ],500);
        }

        return Response::json([
            'status' => 'success',
            'message' => 'Proposta feita com sucesso!'
        ]);
    }
}
