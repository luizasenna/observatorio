@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Linhas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <th>Codido da Linha</th>
                        <th>Nome da Linha</th>
                        <th>Horários</th>
                        <th>Ações</th>

                    @foreach($linhas as $l)
                        <tr>
                            <td>{{ $l->sgLinha }}</td>
                            <td>
                                {{ $l->nomeLinha }} <br/>
                            </td>
                            <td><a href="/horarios/{{$l->id}}" class="btn btn-outline-info" role="button" aria-pressed="true"> Horários</a></td>
                            <td>
                                <a href="/linhas/edit/{{$l->id}}" class="btn btn-outline-secondary" role="button" aria-pressed="true"> <i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="/linhas/delete/{{$l->id}}" class="btn btn-danger" role="button" aria-pressed="true"> <i class="fa-solid fa-trash-can"></i></a>
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
