<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


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

    use SoftDeletes;


    protected $dates = ['deleted_at'];
}
