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
    <div class="card-header">Suas Disciplinas</div>

    <div class="card-body">
        @if($disciplinas->isEmpty())
            Você ainda não possui disciplinas criadas.
        @else
            @foreach($disciplinas as $disciplina)
                <a href="/professor/{{$disciplina->nome}}" class='btn btn-info' role='button'>{{$disciplina->nome}}</a>
            @endforeach
        @endif

    </div>
</div>
@endsection
