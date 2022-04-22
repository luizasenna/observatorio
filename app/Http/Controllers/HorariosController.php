<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horarios;

class HorariosController extends Controller
{
    //
    public function index(){

        return view('horarios.index');
    }

   

}
