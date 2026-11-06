<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_um',
        'titulo_dois',
        'titulo_botao',
        'link_botao',
        'fotografia',
    ];

    /**
     * Ajustes de enquadramento das fotografias.
     */
    public function ajustesImagens(): MorphMany
    {
        return $this->morphMany(
            AjusteImagem::class,
            'imageable'
        );
    }

    /**
     * Ajuste específico da fotografia do slider.
     */
    public function ajusteFotografia()
    {
        return $this->ajustesImagens()
            ->where('campo', 'fotografia');
    }
}
