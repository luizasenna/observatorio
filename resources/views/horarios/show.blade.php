@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Horários da Linha {{ $linha->sgLinha }} - {{ $linha->nomeLinha }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">

                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="<script>$('.alert').alert('close')</script>">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <a href="/horarios/add/{{$linha->id}}" class="btn btn-lg btn-info float-lg-end m-3" role="button" aria-pressed="true"> Adicionar Novo Horário a esta Linha</a>
                        <table class="table">
                            <th>Codido da Linha</th>
                            <th>Horário</th>
                            <th>Ações</th>

                            @foreach($horarios as $h)
                                <tr>
                                    <td>{{ $h->sgLinha }}</td>
                                    <td>
                                        {{ $h->horario }} <br/>
                                    </td>
                                    <td>
                                        <a href="/horarios/edit/{{$h->id}}" class="btn btn-outline-secondary" role="button" aria-pressed="true"> <i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="/horarios/delete/{{$h->id}}" class="btn btn-danger" role="button" aria-pressed="true"> <i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
