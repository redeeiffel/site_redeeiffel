
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');

            $table->string('categoria', 100)
                  ->default('outros');

            $table->string('tipo_calendario', 50)
                  ->nullable()
                  ->unique();

            $table->text('descricao')->nullable();

            $table->string('ano_letivo', 20)->nullable();

            $table->string('ficheiro');

            $table->string('nome_original')->nullable();

            $table->boolean('ativo')->default(true);

            $table->unsignedInteger('ordem')->default(0);

            $table->timestamps();

            $table->index(['categoria', 'ativo']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
