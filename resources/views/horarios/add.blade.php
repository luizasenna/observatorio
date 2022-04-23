@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-info text-white"> Adicionar Horário a Linha
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                        <div class="m-3">
                            <h4>Adicionar novo horário:</h4>

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

                                        <form class="form-horizontal" method="POST" action="{{ route('createNewHorario') }}">

                                            {{ csrf_field() }}

                                            <div class="row m-3 align-items-center">
                                                <div class="col-sm-3">
                                                    <label for="sgLinha" class="col-form-label">Sigla da Linha</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="sgLinha" class="form-control"
                                                           aria-describedby="Sigla" value="{{ $linha->sgLinha }}">
                                                </div>
                                            </div>
                                            <div class="row m-3 align-items-center">
                                                <div class="col-sm-3">
                                                    <label for="nomeLinha" class="col-form-label">Nome da Linha</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nomeLinha" class="form-control"
                                                           aria-describedby="Nome da Linha" value="{{ $linha->nomeLinha }}" >
                                                </div>
                                            </div>
                                            <div class="row m-3 align-items-center">

                                                <div class="col-sm-9">
                                                    <input type="hidden" name="idlinha" class="form-control"
                                                           aria-describedby="Id da Linha" value="{{ $linha->id }}" >
                                                </div>
                                            </div>
                                            <div class="row m-3 align-items-center">
                                                <div class="col-sm-3">
                                                    <label for="horario" class="col-form-label">Horário</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="time" name="horario" class="form-control"
                                                           aria-describedby="Horario" required >
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <a href="/linhas/" class="btn btn-danger " role="button" aria-pressed="true"> Voltar</a>
                                                <button class="btn btn-info float-right" type="submit">Criar</button>

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
