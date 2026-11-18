<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projecto extends Model
{
    protected $table = 'projectos';

    protected $fillable = [
        'titulo',
        'descricao',
        'categoria',
        'liceu',
        'data_projecto',
        'fotografia',
        'publicado',
        'adicionar_ao_slider',
    ];

    protected $casts = [
        'data_projecto' => 'date',
        'publicado' => 'boolean',
    ];

    public const CATEGORIAS = [
        'desenvolvidos' => 'Projectos Desenvolvidos',
        'educacional' => 'Projecto Educacional',
        'formacao_docente' => 'Formação Docente',
        'adicionar_ao_slider' => 'boolean',
    ];
}
