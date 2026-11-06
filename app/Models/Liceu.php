<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Liceu extends Model
{
    protected $fillable = [
        'nome',
        'codigo',
        'tipo',
        'website',
        'ordem',
        'ativo',
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    public function membros(): HasMany
    {
        return $this->hasMany(MembroEquipe::class);
    }
}
