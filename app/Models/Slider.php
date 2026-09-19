<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
    'titulo_um',
    'titulo_dois',
    'titulo_botao',
    'link_botao',
    'fotografia'
];


}
