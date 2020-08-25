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
    <div class="card-header">Provas e Trabalhos da disciplina {{ $disciplina }}</div>

@if(!$provas->isEmpty())
    <div class="card-body">
        <table class='table'>
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Data Limite</th>
                    <th scope="col">Baixar</th>
                    <th scope="col">Enviar Resposta</th>
                </tr>
            </thead>
            @foreach($provas as $prova)
                <tbody>
                    <tr>
                        <th scope="row">{{ $prova->nomeProva }}</th>
                        <td>{{ $prova->dataLimite }}</td>
                        <td><a href="{{ route('baixarProva',['disciplina'=>$disciplina,'prova_nome'=>$prova->nomeProva]) }}" class="btn btn-info material-icons">get_app</a></td></td>
                        <td><a href="{{ route('indexEnviarResposta',['disciplina'=>$disciplina,'prova_nome'=>$prova->nomeProva]) }}" class="btn btn-success material-icons">send</a></td></td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@else
<div class='card-body'>
    A disciplina ainda não possui provas ou trabalhos.
</div>
@endif
</div>
@endsection
