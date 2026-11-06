<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Publicacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'titulo',
        'descricao',
        'data',
        'local',
        'link',
        'texto_inicial',
        'texto_secundario',
        'texto_terceario',
        'texto_quarto',
        'imagem_externa',
        'imagem_interna',
        'imagem_interna_tercearia',
    ];

    public function ajustesImagens(): MorphMany
    {
        return $this->morphMany(
            AjusteImagem::class,
            'imageable'
        );
    }

    public function ajusteImagem(string $campo)
    {
        return $this->ajustesImagens()
            ->where('campo', $campo)
            ->first();
    }
}
