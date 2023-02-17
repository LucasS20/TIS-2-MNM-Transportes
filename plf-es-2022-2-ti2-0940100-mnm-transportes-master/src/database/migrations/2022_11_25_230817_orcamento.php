<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transportadora_id')->constrained('transportadoras', 'id');
            $table->foreignId('servico_id')->constrained('servicos', 'id');
            $table->foreignId('cliente_id')->constrained('clientes', 'id');
            $table->string('feita_por');
            $table->string('proposta');
            $table->boolean('aceita')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orcamentos');
    }
};
