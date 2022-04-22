<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapa;

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
}
