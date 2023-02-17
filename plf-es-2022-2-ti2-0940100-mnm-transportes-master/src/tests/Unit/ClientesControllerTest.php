<?php

namespace App\Http\Controllers;


use App\Models\Cliente;
use Tests\TestCase;

class ClientesControllerTest extends TestCase
{
    private Cliente $testClient;

    protected function setUp(): void
    {
        parent::setUp();
        $this->testClient = Cliente::factory()->create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->testClient->delete();
    }

    public function testClienteNaoPodeLogarSemCredencial()
    {
        $response = $this->post('/api/login_cliente', [], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(422);
    }

    public function testClienteNaoPodeLogarSemEmail()
    {
        $response = $this->post('/api/login_cliente', [
            'email' => 'test@test.com',
            'senha' => '*****'
        ], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(404);
    }

    public function testClienteInformouSenhaErrada()
    {
        $response = $this->post('/api/login_cliente', [
            'email' => $this->testClient->email,
            'senha' => '*****'
        ], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(400);
    }

    public function testClienteDeveLogarComCredenciaisCorretas()
    {
        $response = $this->post('/api/login_cliente', [
            'email' => $this->testClient->email,
            'senha' => '123'
        ], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(200);
    }

    public function testClienteNaoPodeCadastrarSemCredencial()
    {
        $response = $this->post('/api/cadastrar_cliente', [], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(422);
    }

    public function testClienteNaoPodeCadastrarSemEmailOuComEmailExistente()
    {
        //nao passou email
        $cliente = Cliente::factory()->make()->toArray();
        unset($cliente['email']);

        $naoPassouEmail = $this->post('/api/cadastrar_cliente', $cliente, [
            'accept' => 'application/json'
        ]);
        $naoPassouEmail->assertStatus(422);

        //passou email existente
        $clienteComEmailExistente = Cliente::factory()->make([
            'email' => $this->testClient->email
        ])->toArray();

        $emailExistente = $this->post('/api/cadastrar_cliente', $cliente, [
            'accept' => 'application/json'
        ]);

        $emailExistente->assertStatus(422);
    }

    public function testClienteDeveCriarContaComCredenciaisCorretas()
    {
        $cliente = Cliente::factory()->make()->toArray();

        $request = $this->post('/api/cadastrar_cliente', [
            'nome_completo' => $cliente['nome'],
            'email' => $cliente['email'],
            'senha' => '123',
            'senha_confirmation' => '123',
            'telefone' => $cliente['telefone'],
            'cpf' => $cliente['cpf']
        ], [
            'accept' => 'application/json'
        ]);

        Cliente::where('email', $cliente['email'])->delete();
        $request->assertStatus(200);
    }

    public function testSistemaDeveRetornarErroCasoClienteNaoExistaAoRetornarServicos()
    {
        $response = $this->get("/api/cliente/**/servicos", headers: [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(404);
    }

    public function testSistemaDeveRetornarServicosDoClienteCasoExista()
    {
        $response = $this->get("/api/cliente/".$this->testClient->id."/servicos", headers: [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(200);
    }
}
