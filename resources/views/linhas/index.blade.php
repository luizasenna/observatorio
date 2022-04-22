@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                            <td>Horários</td>
                            <td>Editar Linha - Excluir Linha</td>
                        </tr>
                    @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
