<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Mapa;
use Illuminate\Support\Facades\DB;


class ParadaController extends Controller
{

    public function __construct()
    {
      //  $this->middleware('auth');
    }

    public function index()
    {
        return view('/paradas');
    }


    public function todos(){
      $todos = DB::select("select aluno.nome as nomeAluno,
                m.nome as nomeMae, m.telefone1 as telefoneMae,
                p.nome as nomePai, p.telefone1 as telefonePai,
                i.idserie as serie, turno,
                r.nome as contatoSolicitacao, r.telefone1 as telefoneContato, r.email as emailContato, token
                from aluno
                inner join responsavel as m on m.id =aluno.IdMae
                left join responsavel as p on p.id =aluno.IdPai
                inner join inscricao as i on i.idaluno = aluno.id
                inner join responsavel as r on r.id = i.idResponsavel

                group by aluno.nome
                order by aluno.nome, i.created_at desc");

                return view('matricula/all', [

                'all' => $todos,
                'qtde' => 1

                ]);


    }

    public function nova(Request $request){


                $aluno = DB::select("
                select
                aluno.id as idaluno, i.id as idreserva,
                token as identificador,
                 aluno.nome as nome, aluno.nascimento as nascimento,
                naturalidadeCidade, naturalidadeEstado, aluno.sexo as sexo,
                aluno.telefone as telefone, aluno.cpf as cpf, aluno.rg as rg,
                aluno.logradouro as logradouro, aluno.numero as numero,
                aluno.complemento as complemento, aluno.bairro as bairro,
                aluno.cidade as cidade, aluno.estado as estado, aluno.cep as cep,
                certidaonascimento, foto, boletim,
                m.nome as nomeMae, m.nascimento as nascimentomae, m.estadocivil as estadocivilmae,
                m.cpf as cpfmae, m.rg as rgmae, m.profissao as profissaomae, m.localTrabalho as localTrabalhoMae,
                m.renda as rendamae, m.telefone1 as telefone1mae, m.telefone2 as telefone2mae,
                m.email as emailmae, m.horario as horarioligacoesmae, m.logradouro as logradouromae,
                m.numero as numeromae, m.complemento as complementomae, m.bairro as bairromae,
                m.cep as cepmae, m.cidade as cidademae, m.estado as estadomae, m.nacionalidade as nacionalidademae,

                p.nome as nomePai, p.nascimento as nascimentomaepai, p.estadocivil as estadocivilpai,
                p.cpf as cpfpai, p.rg as rgpai, p.profissao as profissaopai, p.localTrabalho as localTrabalhopai,
                p.renda as rendapai, p.telefone1 as telefone1pai, p.telefone2 as telefone2pai,
                p.email as emailpai, p.horario as horarioligacoespai, p.logradouro as logradouropai,
                p.numero as numeropai, p.complemento as complementopai, p.bairro as bairropai,
                p.cep as ceppai, p.cidade as cidadepai, p.estado as estadopai, p.nacionalidade as nacionalidadepai,

                idSerie, i.turno as turno, s.nome as nomeserie

                 from aluno
                inner join responsavel as m on m.id =aluno.IdMae
                left join responsavel as p on p.id =aluno.IdPai
                inner join inscricao as i on i.idaluno = aluno.id
                inner join responsavel as r on r.id = i.idResponsavel
                inner join serie as s on s.id = i.idserie
                where token = '".$request->token."'
                group by aluno.nome
                order by aluno.nome, i.created_at desc");


                return view('matricula/matricula', [

                'token' => $request->token,
                'aluno' => $aluno

                ]);


    }


    public function salvaAPI($reserva){

                  //  $reserva = request()->all();

                    $payload = '{
                                "flowId": "124",
                                "isSimulation": "False",
                                "result": "Abrir matrícula por integração",
                                "formFields": [
                                    {
                                        "name": "nomeDoAluno",
                                        "value": "'.$reserva['nome'].'"
                                    },
                                    {
                                        "name": "dataDeNascimento",
                                        "value": "'.$reserva['nascimento'].'"
                                    },
                                    {
                                        "name": "sexo",
                                        "value": "'.$reserva['sexo'].'"
                                    },
                                    {
                                        "name": "naturalidade",
                                        "value": "'.$reserva['naturalidadecidade']."-".$reserva['naturalidadeestado'].'"
                                    },
                                    {
                                        "name": "cpf",
                                        "value": "'.$reserva['cpf'].'"
                                    },
                                    {
                                        "name": "rg",
                                        "value": "'.$reserva['rg'].'"
                                    },
                                    {
                                        "name": "telefone",
                                        "value": "'.$reserva['telefone'].'"
                                    },
                                    {
                                        "name": "cep",
                                        "value": "'.$reserva['cep'].'"
                                    },
                                    {
                                        "name": "logradouro",
                                        "value": "'.$reserva['logradouro'].'"
                                    },
                                    {
                                        "name": "numero",
                                        "value": "'.$reserva['numero'].'"
                                    },
                                    {
                                        "name": "complemento",
                                        "value": "'.$reserva['complemento'].'"
                                    },
                                    {
                                        "name": "bairro",
                                        "value": "'.$reserva['bairro'].'"
                                    },
                                    {
                                        "name": "UF",
                                        "value": "'.$reserva['estado'].'"
                                    },
                                    {
                                        "name": "cidade",
                                        "value": "'.$reserva['localidade'].'"
                                    },
                                    {
                                        "name": "nomeDoPai",
                                        "value": "'.$reserva['nomepai'].'"
                                    },
                                    {
                                        "name": "dataDeNascimentoPai",
                                        "value": "'.$reserva['nascimentopai'].'"
                                    },
                                    {
                                        "name": "sexoPai",
                                        "value": "'.$reserva['sexopai'].'"
                                    },
                                    {
                                        "name": "cpfPai",
                                        "value": "'.$reserva['cpfpai'].'"
                                    },
                                    {
                                        "name": "rgPai",
                                        "value": "'.$reserva['rgpai'].'"
                                    },
                                    {
                                        "name": "estadoCivilPai",
                                        "value": "'.$reserva['estadocivilpai'].'"
                                    },
                                    {
                                        "name": "emailPai",
                                        "value": "'.$reserva['emailpai'].'"
                                    },
                                    {
                                        "name": "localDeTrabalhoPai",
                                        "value": "'.$reserva['trabalhopai'].'"
                                    },
                                    {
                                        "name": "cargoPai",
                                        "value": "'.$reserva['cargopai'].'"
                                    },
                                    {
                                        "name": "nacionalidadePai",
                                        "value": "'.$reserva['nacionalidadepai'].'"
                                    },
                                    {
                                        "name": "telefone1Pai",
                                        "value": "'.$reserva['telefone1pai'].'"
                                    },
                                    {
                                        "name": "telefone2Pai",
                                        "value": "'.$reserva['telefone2pai'].'"
                                    },
                                    {
                                        "name": "mesmoEnderecoDoAlunoPai",
                                        "value": "Não"
                                    },
                                    {
                                        "name": "cepPai",
                                        "value": "'.$reserva['ceppai'].'"
                                    },
                                    {
                                        "name": "logradouroPai",
                                        "value": "'.$reserva['logradouropai'].'"
                                    },
                                    {
                                        "name": "numeroPai",
                                        "value": "'.$reserva['numeropai'].'"
                                    },
                                    {
                                        "name": "complementoPai",
                                        "value": "'.$reserva['complementopai'].'"
                                    },
                                    {
                                        "name": "bairroPai",
                                        "value": "'.$reserva['bairropai'].'"
                                    },
                                    {
                                        "name": "ufPai",
                                        "value": "'.$reserva['estadopai'].'"
                                    },
                                    {
                                        "name": "cidadePai",
                                        "value": "'.$reserva['cidadepai'].'"
                                    },
                                    {
                                        "name": "nomeDaMae",
                                        "value": "'.$reserva['nomemae'].'"
                                    },
                                    {
                                        "name": "dataDeNascimentoMae",
                                        "value": "'.$reserva['nascimentomae'].'"
                                    },
                                    {
                                        "name": "sexoMae",
                                        "value": "'.$reserva['sexomae'].'"
                                    },
                                    {
                                        "name": "cpfMae",
                                        "value": "'.$reserva['cpfmae'].'"
                                    },
                                    {
                                        "name": "rgMae",
                                        "value": "'.$reserva['rgmae'].'"
                                    },
                                    {
                                        "name": "estadoCivilMae",
                                        "value": "'.$reserva['estadocivilmae'].'"
                                    },
                                    {
                                        "name": "emailMae",
                                        "value": "'.$reserva['emailmae'].'"
                                    },
                                    {
                                        "name": "localDeTrabalhoMae",
                                        "value": "'.$reserva['trabalhomae'].'"
                                    },
                                    {
                                        "name": "cargoMae",
                                        "value": "'.$reserva['cargomae'].'"
                                    },
                                    {
                                        "name": "nacionalidadeMae",
                                        "value": "'.$reserva['nacionalidademae'].'"
                                    },
                                    {
                                        "name": "telefone1Mae",
                                        "value": "'.$reserva['telefone1mae'].'"
                                    },
                                    {
                                        "name": "telefone2Mae",
                                        "value": "'.$reserva['telefone2mae'].'"
                                    },
                                    {
                                        "name": "mesmoEnderecoDoAlunoMae",
                                        "value": "Não"
                                    },
                                    {
                                        "name": "cepMae",
                                        "value": "'.$reserva['cepmae'].'"
                                    },
                                    {
                                        "name": "logradouroMae",
                                        "value": "'.$reserva['logradouromae'].'"
                                    },
                                    {
                                        "name": "numeroMae",
                                        "value": "'.$reserva['numeromae'].'"
                                    },
                                    {
                                        "name": "complementoMae",
                                        "value": "'.$reserva['complementomae'].'"
                                    },
                                    {
                                        "name": "bairroMae",
                                        "value": "'.$reserva['bairromae'].'"
                                    },
                                    {
                                        "name": "ufMae",
                                        "value": "'.$reserva['estadomae'].'"
                                    },
                                    {
                                        "name": "cidadeMae",
                                        "value": "'.$reserva['cidademae'].'"
                                    },
                                    {
                                        "name": "serie",
                                        "value": "'.$reserva['nomeserie'].'"
                                    },
                                    {
                                        "name": "turno",
                                        "value": "'.$reserva['turno'].'"
                                    },
                                    {
                                        "name": "integral",
                                        "value": "'.$reserva['integral'].'"
                                    },
                                    {
                                        "name": "contratanteTipo",
                                        "value": "'.$reserva['responsavel'].'"
                                    },
                                    {
                                        "name": "cpfDoContratante",
                                        "value": "'.$reserva['cpfcontratante'].'"
                                    },
                                    {
                                        "name": "nomeDoSolicitante",
                                        "value": "'.$reserva['nomecontratante'].'"
                                    },
                                    {
                                        "name": "emailDoSolicitante",
                                        "value": "'.$reserva['emailcontratante'].'"
                                    }
                                ],
                                "messages": [
                                    {
                                        "messageBody": "Criado via integração API",
                                        "requesterCanSee": "False"
                                    }
                                ]
                            }';
                          //  dd($payload);
        try {

          $client = new \GuzzleHttp\Client(['base_uri' =>
          'https://esmg.zeev.it/api/2/']);
          $r = $client->request('POST','instances', [
            'headers' => [
                'Authorization' => 'Bearer
                KJtk61VzTZAmL55w9%2b%2fAuQuksNkkMjUEihDMY3wOlTMO5YIQA4WctV4isyLpG8ZKpfqfkR%2bwWj73o4YKskcTGGW5Ej4bvDcWiFA2rrMQp3M%3d',
                'Content-Type'     => 'application/json',
                'Accept' => 'application/json',
                'cookie' => 'Orquestra4=0E01924EC85A689BA7EF02844710A1F5CADB89ECC9886D59477CD0FCAF8305C224B6C004F058C6777E2659F6CAA3A4C66B555E611BC60BFD2AD2BA393331AE4DE61CDC1D1F745721E848F90DE00CCEF0F7DD0182C8F029C4434992B171DF2BDE2C097BC588C70CC9121FE51E086BDA94BE7F8D97BF3A1CA8F4F25A81C720DFDA620FA6C886512BE68EEC24A6A8F57C163CD26D2682FEED329916CD03293ACC910EF93A6BB9873BE7F947F38E3BC814FBFBA1478EA2D64F35B5578EE40F9659A32ADB542C60EA6845DB1C7AFA248F0A0E5D7E49E4091181F48973AAA2AC034A63501EF9F561D83681C15D063030E3E8ECDDC946E8CE0BA0244E455434EF3AF6BDBD3CD5B3F43712282A2F433DC6A8C285'
            ], 'body' =>  $payload
          ]);
          $response = $r->getBody();
          $data = json_decode($response);
        //  dd($data);



      } /*catch(Exception $e) {

        echo json_encode(
            array(
                'status' => false,
                'error' => $e -> getMessage(),
                'error_code' => $e -> getCode()
            )
        );
        exit;
    }*/
  catch (\GuzzleHttp\Exception\BadResponseException $e) {

            ddd($e->getResponse()->getBody()->getContents());

        }
        return view('matricula/done', [

         'data' => $data,
         'qtde' => 1

         ]);
      }


      public function matricular(Request $request){

          $reserva = request()->all();



          $nameFile = null;
        /*  $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó',
           'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë',
           'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú' );
          $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o',
        'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I',
         'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');*/

          // Verifica se informou o arquivo e se é válido
          if (request()->hasFile('certidaonascimento') && request()->file('certidaonascimento')->isValid()) {

              $name = $reserva['nome'].'-CertidaodeNascimento';
              $extension = $request->certidaonascimento->extension();
              $nameFile = "{$name}.{$extension}";
              $reserva['certidaonascimento'] = $nameFile;
            //  $reserva['certidaonascimento'] = str_replace($comAcentos, $semAcentos, $nameFile);
              $upload = $request->certidaonascimento->storeAs('public', $nameFile);
              // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
          }

          if (request()->hasFile('foto') && request()->file('foto')->isValid()) {

              $name = $reserva['nome'].'-Foto';
              $extension = $request->foto->extension();
               $nameFile = "{$name}.{$extension}";
               $reserva['foto'] = $nameFile;
              // $reserva['foto'] = str_replace($comAcentos, $semAcentos, $nameFile);
              $upload = $request->foto->storeAs('public', $nameFile);
              // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
          }
          if (request()->hasFile('boletim') && request()->file('boletim')->isValid()) {


              $name = $reserva['nome'].'-Boletim';
              $extension = $request->boletim->extension();
              $nameFile = "{$name}.{$extension}";
              $reserva['boletim'] = $nameFile;
            //  $reserva['boletim'] = str_replace($comAcentos, $semAcentos, $nameFile);
              $upload = $request->boletim->storeAs('public', $nameFile);
              // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
          }
          if (request()->hasFile('quitacao') && request()->file('quitacao')->isValid()) {

              $name = $reserva['nome'].'-Quitacao';
              $extension = $request->quitacao->extension();
               $nameFile = "{$name}.{$extension}";
               $reserva['quitacao'] = $nameFile;
              // $reserva['quitacao'] = str_replace($comAcentos, $semAcentos, $nameFile);
              $upload = $request->quitacao->storeAs('public', $nameFile);
              // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
          }
          if (request()->hasFile('compendereco') && request()->file('compendereco')->isValid()) {

              $name = $reserva['nome'].'-ComprovanteEndereco';
              $extension = $request->compendereco->extension();
               $nameFile = "{$name}.{$extension}";
               $reserva['compendereco'] = $nameFile;
               //$reserva['compendereco'] = str_replace($comAcentos, $semAcentos, $nameFile);
              $upload = $request->compendereco->storeAs('public', $nameFile);
              // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
          }


          $matricula =  Matricula::create($reserva);
          $matricula->save();


          MatriculaController::salvaAPI($reserva);

          return view('matricula/done', [

           '1' => 1,
           'qtde' => 1

           ]);

      }


      public function arquivos(Request $request){

      //  $aluno = Aluno::where('nomeurl', '=', $request->nomeurl)->get();
      $aluno = DB::select("select max(aluno.id), aluno.nome,
                aluno.certidaonascimento as acertidaonascimento,
                aluno.foto as afoto,
                aluno.quitacao as aquitacao,
                aluno.boletim as aboletim,
                aluno.compendereco as acompendereco,
                matricula.certidaonascimento as mcertidaonascimento,
                matricula.foto as mfoto,
                matricula.quitacao as mquitacao,
                matricula.boletim as mboletim,
                matricula.compendereco as mcompendereco
                from aluno
                left join matricula on aluno.nome = matricula.nome
                where nomeurl = '".$request->nomeurl."'

                group by aluno.nome
                order by aluno.nome asc");

        return view('matricula/arquivos', [


          'aluno' => $aluno

          ]);


        }








  }
