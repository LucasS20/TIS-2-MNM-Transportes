<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn () => view('welcome'))->name('lading');
Route::get('/login_cliente', [FrontEndController::class, 'loginCliente'])->name('login');
Route::get('/cadastro_cliente', [FrontEndController::class, 'cadastroCliente'])->name('cadastro.cliente');

Route::get('/login_transportadora', [FrontEndController::class, 'loginTransportadora'])->name('login.transportadora');
Route::get('/cadastro_transportadora', [FrontEndController::class, 'cadastroTransportadora'])->name('cadastro.transportadora');

## rotas admin
Route::get('/login_admin', [AdminController::class, 'loginAdmin'])->name('login.admin');
Route::post('/admin/desempenhos', [AdminController::class, 'validarLogin'])->name('validar.login.admin');



Route::middleware(['auth:sanctum'])->group(function () {
   Route::get('/painel', [FrontEndController::class, 'painel'])->name('dashboard.painel');
   Route::get('/cadastrar_servico', [FrontEndController::class, 'cadastrarServico'])->name('cadastro.servico');
   Route::get('/servico/{id}', [FrontEndController::class, 'visualizarServico'])->name('visualizar.servico');
   Route::get('/sair', [FrontEndController::class, 'deslogar']);
});

Route::group(['middleware' => ['web' => 'auth:transportadoras']], function () {
    Route::get('/funcionarios', [FrontEndController::class, 'funcionarios'])->name('visualizar.funcionarios');
    Route::get('/servico_transportadora/{servico}', [FrontEndController::class, 'visualizarServicoTransportadora'])->name('visualizar.servico.transportadora');
});
Route::view('/contato', 'contato.contato');
Route::view('/sobre', 'sobre.sobre');
Route::view('/trabalhe-conosco', 'trabalhe-conosco.trabalhe');