@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="card">
    <div class="card-header">Suas notas</div>

    <div class="card-body">
        @if($notas->isEmpty())
            Você ainda não possui nenhuma prova ou trabalho enviado e não possui notas.
        @else
        @foreach($disciplinas as $disciplina)
        <h2>{{ $disciplina->nome }} {{ $disciplina->anoPeriodo }}</h2>
            <table class='table'>
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Nota</th>
                        </tr>
                    </thead>
                    @foreach($notas as $nota)
                        @if($nota->nome==$disciplina->nome)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $nota->nomeProva }}</th>
                                    <td>{{ $nota->nota }}</td>
                                </tr>
                            </tbody>
                        
                        @endif
                    @endforeach
                </table>
        @endforeach
        @endif
    </div>
</div>
@endsection