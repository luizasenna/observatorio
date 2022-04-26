@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-info text-white">{{ __('Contacts Dashboard') }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                        <div class="m-3">
                            <h4>Atualizar Horario:</h4>

                            <section class="content">

                                <div class="row">
                                    <div class="col-md-12">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form class="form-horizontal" method="POST" action="{{ route('updateHorario') }}">

                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" class="form-control"
                                                   aria-describedby="id" required value="{{$horario->id}}">
                                             <input type="hidden" name="idlinha" class="form-control"
                                                  aria-describedby="id" required value="{{$horario->idlinha}}">


                                            <div class="row m-3 align-items-center">
                                                <div class="col-sm-3">
                                                    <label for="sigla" class="col-form-label">Sigla da Linha</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="sgLinha" class="form-control"
                                                           aria-describedby="Sigla da Linha" required value="{{ $horario->sgLinha }}">
                                                </div>
                                            </div>
                                            <div class="row m-3 align-items-center">
                                                <div class="col-sm-3">
                                                    <label for="nome" class="col-form-label">Nome da Linha</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nomeLinha" class="form-control"
                                                           aria-describedby="Nome da Linha" required value="{{ $horario->linha->nomeLinha }}">
                                                </div>
                                            </div>
                                            <div class="row m-3">
                                                <div class="col-sm-3">
                                                    <label for="horario" class="col-form-label">Horário</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="horario" class="form-control"
                                                           aria-describedby="Horario" value="{{ $horario->horario }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <a href="/horario/{{$horario->idlinha}}" class="btn btn-danger " role="button" aria-pressed="true"> Voltar</a>
                                                <button class="btn btn-info float-right" type="submit">Atualizar</button>

                                            </div>



                                        </form>


                                    </div>
                                </div>

                            </section>


                        </div>

                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
