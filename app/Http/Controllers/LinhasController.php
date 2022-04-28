<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapa;
use App\Models\Linha;
use App\Models\Horario;

class LinhasController extends Controller
{
    public function index()
    {
        //$linhas = Mapa::all();
        $linhas = Horario::groupBy('sgLinha')->orderBy('sgLinha')->get();
       // $qtde = $linhas->count();
       // dd($qtde);
   
        return view('/paradas',[
           'linhas' => $linhas
        ]);
    }

    public function getLinha(Request $request){

      $linha = request()->all();
      $linhas = Horario::groupBy('sgLinha')->orderBy('sgLinha')->get();
    
      $horarios = Horario::where('sgLinha', '=', $linha['selectLinha'])->get();
      $l = Mapa::where('sgLinha', '=' ,$linha['selectLinha'])->get();
      
      //dd($horarios);
      return view('/paradas',[
         'linhas' => $linhas,
         'resultado' => $l,
         'horarios' => $horarios
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
        $mapa = Mapa::create($request->all());
        return redirect()->intended('/linhas/')->with('status', 'Nova linha criada.');


    }

    public function edit(int $id){
        $linha = Linha::findOrFail($id);
        return view('/linhas/edit', [
            'linha' => $linha
        ]);

    }

    public function update(Request $request){


        $linha = Linha::findOrFail($request->id);
        $mapa = Mapa::findOrFail($request->sgLinha);

        $linha->fill($request->all());
        $linha->save();

        $mapa->fill($request->all());
        $mapa->save();

        return redirect()->intended('/linhas/index')->with('status', 'Linha atualizada.');

    }

    public function delete(int $id){

        Linha::findOrFail($id)->delete();
        return redirect()->intended('/linhas/')
            ->with('status', 'Linha deletada com sucesso.');

    }


}
