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
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->integer('cliente_id');
            $table->integer('transportadora_id')->nullable();
            $table->text('endereco_retirada');
            $table->text('endereco_entrega');
            $table->string('data');
            $table->string('valor_proposta')->nullable();
            $table->string('valor_final')->nullable();
            $table->integer('quantidade_itens');
            $table->boolean('servico_completo')->default(false);
            $table->string('status_pagamento')->default('pending');
            $table->timestamp('data_servico_pago')->nullable();
            $table->timestamp('data_servico_finalizado')->nullable();
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
        Schema::dropIfExists('servicos');
    }
};
