@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-info text-white"> Adicionar Linha
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                        <div class="m-3">
                            <h4>Adicionar nova linha:</h4>

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

                                        <form class="form-horizontal" method="POST" action="{{ route('createNew') }}">

                                            {{ csrf_field() }}

                                            <div class="row m-3 align-items-center">
                                                <div class="col-sm-3">
                                                    <label for="codigo" class="col-form-label">Código da Linha</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="codigoLinha" class="form-control"
                                                           aria-describedby="Código" >
                                                </div>
                                            </div>
                                            <div class="row m-3 align-items-center">
                                                <div class="col-sm-3">
                                                    <label for="sigla" class="col-form-label">Sigla da Linha</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="sgLinha" class="form-control"
                                                           aria-describedby="Sigla da Linha" required >
                                                </div>
                                            </div>
                                            <div class="row m-3 align-items-center">
                                                <div class="col-sm-3">
                                                    <label for="nome" class="col-form-label">Nome da Linha</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nomeLinha" class="form-control"
                                                           aria-describedby="Nome da Linha" required >
                                                </div>
                                            </div>
                                            <div class="row m-3 align-items-center">
                                                <div class="col-sm-3">
                                                    <label for="nome" class="col-form-label">Origem</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="getOrigemIda" class="form-control"
                                                           aria-describedby="Origem" required >
                                                </div>
                                            </div>
                                            <div class="row m-3 align-items-center">
                                                <div class="col-sm-3">
                                                    <label for="nome" class="col-form-label">Destino</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="destinoIda" class="form-control"
                                                           aria-describedby="Destino" required >
                                                </div>
                                            </div>
                                            <div class="row m-3">
                                                <div class="col-sm-3">
                                                    <label for="email" class="col-form-label">Consórcio</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="consorcio" class="form-control"
                                                           aria-describedby="Consorcio" ">
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
