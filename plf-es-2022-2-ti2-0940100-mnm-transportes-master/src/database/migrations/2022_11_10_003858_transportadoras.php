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
        Schema::create("transportadoras", function (Blueprint $table){
            $table->id();
            $table->string('cnpj')->unique();
            $table->string('nome_transportadora');
            $table->string('email_transportadora')->unique();
            $table->string('senha');
            $table->string('telefone');
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
        Schema::dropIfExists('transportadoras');
    }
};
