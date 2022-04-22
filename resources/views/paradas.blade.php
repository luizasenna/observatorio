<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

  <div class="card">
  <div class="card-body">

    <form method="GET" action="/getLinha" >
      <div class="input-group mb-3">
        <select name="selectLinha" class="form-select form-select-lg " aria-label=".form-select-lg example">
                <option selected>Selecione a Linha</option>

                @foreach ($linhas as $l)
                      <option value="{{$l->sgLinha}}"
                        @if(isset($resultado))
                          {{ $resultado[0]->sgLinha == $l->sgLinha ? 'selected' : '' }}
                        @endif >
                      {{$l->sgLinha}} - {{$l->nomeLinha}}</option>
                @endforeach
        </select>
        <button class="btn btn-danger" type="submit">Selecionar</button>
      </div>


    </form>
    <div class="card">
      <div class="card-body" id="mapaLinha">

        @if(isset($resultado))
          <iframe src="{{$resultado[0]->mapa}}" width="100%" height="480"></iframe>
        @endif
      </div>
    </div>
  </div>
  </div>

</body>
</html>
