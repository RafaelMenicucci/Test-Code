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
@if (session('info'))
    <div class="alert alert-warning fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="card">
    <div class="card-header">Disciplinas em que está matriculado</div>

    <div class="card-body">
        @if($disciplinas->isEmpty())
            Você ainda não foi matriculado em uma disciplina.
        @else
            @foreach($disciplinas as $disciplina)
                <a href="/aluno/{{$disciplina->nome}}" class='btn btn-info' role='button'>{{$disciplina->nome}}</a>
            @endforeach
        @endif

    </div>
</div>
@endsection
