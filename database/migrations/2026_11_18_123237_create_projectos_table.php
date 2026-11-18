<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projectos', function (Blueprint $table) {
            $table->id();

            $table->string('titulo', 255);
            $table->text('descricao');

            // Página pública onde será apresentado
            $table->string('categoria', 50);

            // Informação do projecto
            $table->string('liceu')->nullable();
            $table->date('data_projecto')->nullable();

            // Fotografia principal
            $table->string('fotografia')->nullable();

            // Publicação
            $table->boolean('publicado')->default(false);

            $table->timestamps();

            $table->index(['categoria', 'publicado']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projectos');
    }
};
