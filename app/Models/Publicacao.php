<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    'imagem_interna_tercearia'
];
}
