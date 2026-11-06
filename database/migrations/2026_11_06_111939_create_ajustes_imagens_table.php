
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ajustes_imagens', function (Blueprint $table) {
            $table->id();

            $table->morphs('imageable');

            $table->string('campo', 100);

            $table->unsignedTinyInteger('posicao_x')
                ->default(50);

            $table->unsignedTinyInteger('posicao_y')
                ->default(15);

            $table->unsignedSmallInteger('zoom')
                ->default(100);

            $table->timestamps();

            $table->unique([
                'imageable_type',
                'imageable_id',
                'campo'
            ], 'ajustes_imagens_unico');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ajustes_imagens');
    }
};
