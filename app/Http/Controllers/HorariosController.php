<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Linha;

class HorariosController extends Controller
{
    //
    public function index(){

        return view('horarios.index');
    }

    public function show(int $id){
        $horarios = Horario::where('idlinha', '=', $id);
        $linha = Linha::findOrFail($id);


        return view('horarios/show', [
            'horarios' => $horarios,
            'linha' => $linha
        ]);
    }



}
