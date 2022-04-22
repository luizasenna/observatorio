<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Mapa;
use Illuminate\Support\Facades\DB;


class MapaController extends Controller
{
  
    public function index()
    {
        return view('/paradas');
    }


     public function busca()
    {



        return view('/paradas', [

            'pessoas'  => 1
         ]);
    }



    public function pessoa($id)
    {

       $pessoa = AgendaPessoa::where('id', '=',$id)->get();
       $telefones = AgendaTelefone::where('idpessoa', '=',$id)->get();
       $enderecos = AgendaEndereco::where('idpessoa', '=',$id)->get();
       $emails = AgendaEmail::where('idpessoa', '=',$id)->get();

        return view('/agenda/pessoa', [
            'pessoa'     => $pessoa,
            'telefones'  => $telefones,
            'enderecos'  => $enderecos,
            'emails'     => $emails
         ]);

    }


}
