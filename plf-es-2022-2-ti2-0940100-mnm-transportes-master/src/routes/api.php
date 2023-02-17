<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\TransportadoraController;
use App\Models\Cliente;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

## Rotas de autenticação
Route::post('/login_cliente', [ClientesController::class, 'loginCliente'])->name('api.login.cliente');
Route::post('/cadastrar_cliente', [ClientesController::class, 'cadastroCliente'])->name('api.cadastro.cliente');
Route::post('/cadastrar_transportadora', [TransportadoraController::class, 'cadastrarTransportadora']);
Route::post('/login_transportadora', [TransportadoraController::class, 'loginTransportadora']);

## Rotas de serviço
Route::post('/cadastrar_servico', [ServicosController::class, 'cadastrarServico']);
Route::post('/retornar_servico/{id}', [ServicosController::class, 'retornarServico']);
Route::post('/servico/{id}/avaliar', [ServicosController::class, 'avaliarServico']);
Route::post('/finalizar_servico/{id}', [ServicosController::class, 'finalizarServico']);
Route::post('/aceitar_proposta/{servicoId}', [ServicosController::class, 'aceitarProposta']);
Route::post('/cancelar_servico/{servico}', [ServicosController::class, 'cancelarServico']);

## Rotas de cliente
Route::get('/cliente/{id}/servicos', [ClientesController::class, 'retornarServicosCliente']);

## Rotas de entregador
Route::post('/cadastrar_entregador', [TransportadoraController::class, 'cadastrarEntregador']);
Route::delete('/deletar_entregador/{entregador}', [TransportadoraController::class, 'deletarEntregador']);

## Rotas de transportadora
Route::get('/retornar_entregadores/{transportadoraId}', [TransportadoraController::class, 'retornarEntregadores']);
Route::get('/servicos_transportadora/{transportadoraId}', [TransportadoraController::class, 'retornarServicos'])->name('visualizar.servico.transportadora');
Route::post('/fazer_orcamento/{servico}', [TransportadoraController::class, 'fazerOrcamento']);
