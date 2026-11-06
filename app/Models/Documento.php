<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';

    protected $fillable = [
        'titulo',
        'categoria',
        'tipo_calendario',
        'descricao',
        'ano_letivo',
        'ficheiro',
        'nome_original',
        'ativo',
        'ordem',
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'ordem' => 'integer',
    ];
}
