<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class MembroEquipe extends Model
{
    protected $fillable = [
        'liceu_id',
        'nome',
        'cargo',
        'fotografia',
        'biografia',
        'ordem',
        'ativo',
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    public function liceu(): BelongsTo
    {
        return $this->belongsTo(Liceu::class);
    }

    public function ajustesImagens(): MorphMany
    {
        return $this->morphMany(
            AjusteImagem::class,
            'imageable'
        );
    }

    public function ajusteFotografia()
    {
        return $this->ajustesImagens()
            ->where('campo', 'fotografia')
            ->first();
    }
}
