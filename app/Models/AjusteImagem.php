<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class AjusteImagem extends Model
{
    protected $table = 'ajustes_imagens';

    protected $fillable = [
        'campo',
        'posicao_x',
        'posicao_y',
        'zoom',
    ];

    protected $casts = [
        'posicao_x' => 'integer',
        'posicao_y' => 'integer',
        'zoom' => 'integer',
    ];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
