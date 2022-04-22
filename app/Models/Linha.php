<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linha extends Model
{
    use HasFactory;

    protected $fillable = [
        'sgLinha',
        'codigoLinha',
        'getOrigemIda',
        'destinoIda',
        'nomeLinha',
        'consorcio'
    ];
}
