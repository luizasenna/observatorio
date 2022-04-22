<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapa;
use App\Models\Linha;

class LinhasController extends Controller
{
    public function index()
    {
        $linhas = Mapa::all();
        return view('/paradas',[
           'linhas' => $linhas
        ]);
    }

    public function getLinha(Request $request){

      $linha = request()->all();
      $linhas = Mapa::orderBy('sgLinha')->get();
      $l = Mapa::where('sgLinha', '=' ,$linha['selectLinha'])->get();
      return view('/paradas',[
         'linhas' => $linhas,
         'resultado' => $l
      ]);

    }

    public function show(){
      $linhas = Linha::all();

      return view('linhas/index',[
        'linhas' => $linhas
      ]);
    }
}
