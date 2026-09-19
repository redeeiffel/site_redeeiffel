<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('publicacaos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo')->nullable();
            $table->string('titulo')->nullable();
            $table->text('descricao')->nullable();
            $table->date('data')->nullable();
            $table->string('local')->nullable();
            $table->string('link')->nullable();
            $table->text('texto_inicial')->nullable();
            $table->text('texto_secundario')->nullable();
            $table->text('texto_terceario')->nullable();
            $table->text('texto_quarto')->nullable();
            $table->string('nomes')->nullable();
            $table->string('nomes_um')->nullable();
            $table->string('imagem_externa')->nullable();
            $table->string('imagem_interna')->nullable();
            $table->string('imagem_interna_tercearia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacaos');
    }
};