<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membro_equipes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('liceu_id')
                ->constrained('liceus')
                ->restrictOnDelete();

            $table->string('nome');
            $table->string('cargo');
            $table->string('fotografia')->nullable();
            $table->text('biografia')->nullable();
            $table->unsignedInteger('ordem')->default(0);
            $table->boolean('ativo')->default(true);
            $table->timestamps();

            $table->index(['liceu_id', 'ativo', 'ordem']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membro_equipes');
    }
};
