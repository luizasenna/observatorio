<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
                      {{$l->sgLinha}} - {{$l->linha->nomeLinha ?? ''}}</option>
                @endforeach
        </select>
        <button class="btn btn-danger" type="submit">Selecionar</button>
      </div>


    </form>
    
    <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Paradas</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Horários</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Mais Informações</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  <div class="card">
      <div class="card-body" id="mapaLinha">

        @if(isset($resultado))
          <iframe src="{{$resultado[0]->mapa}}" width="100%" height="480"></iframe>
        @endif
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        
  <p class="m-4">Linha: {{ $horarios[0]->sgLinha ?? 'Selecione a Linha' }} - {{ $horarios[0]->linha->nomeLinha ?? ''}}</p> <br/>
  <table class="table col-md-5">
    @if(!empty($horarios))
        @foreach($horarios as $h)
          <tr>
            <td>
            {{ $h->horario }}
            <td>
          </tr>  
        @endforeach
    @endif
  </table>
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">c</div>
</div>

   

  </div>
  </div>

  <script>
    var triggerTabList = [].slice.call(document.querySelectorAll('#nav-tab button'))
triggerTabList.forEach(function (triggerEl) {
  var tabTrigger = new bootstrap.Tab(triggerEl)

  triggerEl.addEventListener('click', function (event) {
    event.preventDefault()
    tabTrigger.show()
  })
})
  </script>
</body>
</html>
