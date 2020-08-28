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
    <div class="card-header">{{ $disciplina }}</div>

    <div class="card-body">
    <li class="list-group-item">
        <a href="/professor/{{$disciplina}}/upload" class='btn btn-primary' role='button'>Fazer Upload do Projeto</a>
        <a class="btn btn-primary" href="/professor/{{$disciplina}}/adicionarAluno">{{ __('Adicionar Aluno') }}</a>        
        <a class="btn btn-primary" role='button' href="/professor/{{$disciplina}}/projetos">Criar Avaliação</a>
        <a class="btn btn-primary" role='button' href="/professor/{{$disciplina}}/notas">Ver Notas</a>        
    </li>
    </div>
</div>
@if (session('erro'))
    <div class="alert alert-danger fade show" role="alert">
        {{ session('erro') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('info'))
    <div class="alert alert-info fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@endsection
