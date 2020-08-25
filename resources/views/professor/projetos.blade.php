@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Seus Projetos da disciplina {{$disciplina}}</div>

    <div class="card-body">
        @if($projetos->isEmpty())
            Você ainda não possui projetos enviados.
        @else
            @foreach($projetos as $projeto)
                <a href="{{ route('paginaCriarProva',['disciplina'=>$disciplina,'nomeProjeto'=>$projeto->nomeProjeto]) }}" class='btn btn-info' role='button'>{{$projeto->nomeProjeto}}</a>
            @endforeach
        @endif

    </div>
</div>
@endsection
