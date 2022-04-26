<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container m-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">Quadro de Horários</div>
                    <table class="table">
                        <th>Linha</th>
                        <th>Horário</th>
                        <th>Horário</th>
                        <th>Horário</th>
                        <th>Horário</th>
                        @foreach($linhas as $l)
                          <tr>
                          <td>{{$l->sgLinha}} -  {{$l->nomeLinha ?? ''}}</td>      
                            @foreach($horarios as $h)
                                  @if($l->id == $h->idlinha)
                                     <td>{{$h->horario}} </td>   
                                 @endif             
                             @endforeach
                          </tr>
                        @endforeach
                       
                    </table>
                
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>


