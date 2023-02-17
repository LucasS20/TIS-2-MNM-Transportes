<?php

namespace App\Http\Controllers;


use App\Models\Avaliacao;
use App\Models\Cliente;
use App\Models\Servico;
use Tests\TestCase;

class ServicosControllerTest extends TestCase
{

    private Servico $servicoTeste;

    protected function setUp(): void
    {
        parent::setUp();

        $this->servicoTeste = Servico::factory()->create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->servicoTeste->delete();

    }

    public function testServicoNaoPodeSerCadastradoSemCredenciais()
    {
        $response = $this->post('/api/cadastrar_servico', [], ['Accept' => 'application/json']);

        $response->assertStatus(422);
    }

    public function testServicoDeveSerCadastradoComCredenciaisCorretas()
    {
        $servico = Servico::factory()->create();
        $servicoArray = $servico->toArray();
        $servico->delete();

        $response = $this->post('/api/cadastrar_servico',$servicoArray, [
            'Accept' => 'application/json'
        ]);

        Servico::where('transportadora_id', $servicoArray['transportadora_id'])->first()->delete();
        $response->assertStatus(200);
    }

    public function testSistemaNaoDeveRetornarServicoCasoNaoExista()
    {
        $idServico = -1;

        $response = $this->post("/api/retornar_servico/$idServico", headers: [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(404);
    }

    public function testSistemaDeveRetornarServicoCasoExista()
    {
        $idServico = $this->servicoTeste->id;

        $response = $this->post("/api/retornar_servico/$idServico", headers: [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(200);
    }

    public function testSistemaDeveFinalizarServico()
    {
        $response = $this->post("/api/finalizar_servico/".$this->servicoTeste->id, headers: [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(200);
    }

    public function testServicoNaoPodeSerAvaliadoCasoNaoExista()
    {
        $servicoId = -1;

        $response = $this->post("/api/servico/$servicoId/avaliar", headers: [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(404);
    }

    public function testServicoNaoPodeSerAvaliadoSemCredenciais()
    {
        $response = $this->post("/api/servico/".$this->servicoTeste->id."/avaliar", headers: [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(422);
    }

    public function testServicoDeveSerAvaliadoComCredenciaisCorretas()
    {
        $idTest = rand(1111, 9999);

        $response = $this->post("/api/servico/".$this->servicoTeste->id."/avaliar",[
            'cliente_id' => $idTest,
            'nota' => rand(0, 5)
        ], [
            'Accept' => 'application/json'
        ]);

        Avaliacao::where('cliente_id', $idTest)->first()->delete();
        $response->assertStatus(200);
    }
}
