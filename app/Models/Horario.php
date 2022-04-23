<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Horario extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'sgLinha',
        'idlinha',
        'horario'
    ];

    use SoftDeletes;


    protected $dates = ['deleted_at'];
}
