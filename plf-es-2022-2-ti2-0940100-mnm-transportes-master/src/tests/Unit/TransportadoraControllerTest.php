<?php

namespace App\Http\Controllers;


use App\Models\Cliente;
use App\Models\Entregador;
use App\Models\Transportadora;
use Nette\Utils\Json;
use Nette\Utils\JsonException;
use Tests\TestCase;

class TransportadoraControllerTest extends TestCase
{
    private Transportadora $testTransportadora;

    protected function setUp(): void
    {
        parent::setUp();
        $this->testTransportadora = Transportadora::factory()->create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->testTransportadora->delete();
    }


    public function testTransportadoraNaoPodeCadastrarSemCredencial()
    {
        $response = $this->post('/api/cadastrar_transportadora', [], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(422);
    }

    public function testTransportadoraInformouEmailExistente()
    {
        $response = $this->post('/api/cadastrar_transportadora', [
            'email_transportadora' => $this->testTransportadora->email_transportadora,
            'cnpj' => '****',
            'nome_transportadora' => '****',
            'senha' => '****',
            'telefone' => '****'

        ], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(422);
    }

    public function testTransportadoraInformouCNPJExistente()
    {
        $response = $this->post('/api/cadastrar_transportadora', [
            'email_transportadora' => '*****',
            'cnpj' => $this->testTransportadora->cnpj,
            'nome_transportadora' => '****',
            'senha' => '****',
            'telefone' => '****'

        ], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(422);
    }

    public function testTrasnportadoraDeveCriarContaComCredenciaisCorretas()
    {
        $response = $this->post('/api/cadastrar_transportadora', [
            'email_transportadora' => 'teste@gmail.com',
            'cnpj' => '12345678',
            'nome_transportadora' => '****',
            'senha' => '****',
            'telefone' => '****'
        ]);

        Transportadora::where('email_transportadora', 'teste@gmail.com')->first()->delete();
        $response->assertStatus(200);
    }

    public function testTransportadoraNaoPodeCadastrarEntregadorSemCredenciais()
    {
        $response = $this->post('/api/cadastrar_entregador', [], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(422);
    }

    /**
     * @throws JsonException
     */
    public function testTransportadoraDeveCadastrarEntregadorComCredenciaisCorretas()
    {
        $id = $this->testTransportadora->id;

        $response = $this->post('/api/cadastrar_entregador', [
            'transportadora_id' => $id,
            'nome' => '****'
        ], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(200);
        Entregador::where('transportadora_id', $id)->first()->delete();
    }

    public function testSistemaNaoPodeRetornarEntregadoresDeUmaTransportadoraInexistente()
    {
        $response = $this->get('/api/retornar_entregadores/****');

        $response->assertStatus(404);
    }

    public function testSistemaDeveRetornarEntregadoresDeUmaTransportadoraCasoExistir()
    {
        $response = $this->get("/api/retornar_entregadores/".$this->testTransportadora->id);

        $response->assertStatus(200);
    }

    public function testSistemaNaoPodeRetornarServicosDeUmaTransportadoraInexistente()
    {
        $response = $this->get("/api/servicos_transportadora/****");

        $response->assertStatus(404);
    }

    public function testSistemaDeveRetornarServicosDeUmaTransportadoraCasoExista()
    {
        $response = $this->get("/api/servicos_transportadora/".$this->testTransportadora->id);

        $response->assertStatus(200);
    }
}
