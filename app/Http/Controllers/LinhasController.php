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
      $linhas = Linha::orderBy('sgLinha')->get();

      return view('linhas/index',[
        'linhas' => $linhas
      ]);
    }

    public function create(Request $request){


        $new = Linha::create($request->all());
        return redirect()->intended('/linhas/index')->with('status', 'Nova linha criada.');


    }

    public function edit(int $id){
        $linha = Linha::findOrFail($id);
        return view('/linhas/edit', [
            'linha' => $linha
        ]);

    }

    public function update(Request $request){


        $linha = Linha::findOrFail($request->id);

        $linha->fill($request->all());
        $linha->save();

        return redirect()->intended('/linhas/index')->with('status', 'Linha atualizada.');

    }


}
