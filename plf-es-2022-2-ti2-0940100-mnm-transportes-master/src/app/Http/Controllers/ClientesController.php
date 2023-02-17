<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class ClientesController extends Controller
{
    public function loginCliente(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required'
        ]);

        $email = $request->input('email');
        $senha = $request->input('senha');

        $cliente = Cliente::where('email', $email)->first();

        if(! $cliente) {
            return Response::json([
                'status' => 'error',
                'message' => 'Cliente não encontrado.'
            ], 404);
        }

        if(! Hash::check($senha, $cliente->senha)) {
            return Response::json([
                'status' => 'error',
                'message' => 'Usuário e senha não coincidem.'
            ], 400);
        }

        Auth::login($cliente);
        return Response::json([$cliente]);
    }

    public function cadastroCliente(Request $request)
    {
        $request->validate([
            'nome_completo' => 'required',
            'email' => 'required|email|unique:clientes',
            'senha' => 'required|confirmed',
            'telefone' => 'required',
            'cpf' => 'required|unique:clientes'
        ]);

        $data = [
            'nome' => $request->input('nome_completo'),
            'email' => $request->input('email'),
            'senha' => Hash::make($request->input('senha')),
            'telefone' => $request->input('telefone'),
            'cpf' => $request->input('cpf')
        ];

        $cliente = Cliente::create($data);

        Auth::login($cliente);
        return Response::json([$cliente]);
    }

    public function retornarServicosCliente($id)
    {
        if(! $cliente = Cliente::find($id)) {
            return Response::json([
                'status' => 'error',
                'message' => 'Cliente não encontrado.'
            ], 404);
        }


        return $cliente->servicos()->get();
    }
}
