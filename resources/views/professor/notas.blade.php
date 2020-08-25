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
    <div class="card-header">Notas dos Alunos da Disciplina:{{$disciplina}}</div>

    <div class="card-body">
        @if($notas->isEmpty())
            Seus alunos ainda não enviaram resposta.
        @else
            <table class='table'>
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Matricula</th>
                            <th scope="col">Nota</th>
                        </tr>
                    </thead>
                    @foreach($notas as $nota)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $nota->nome }}</th>
                                <td>{{ $nota->matricula }}</td>
                                <td>{{ $nota->nota }}</td>
                            </tr>
                        </tbody>
                    @endforeach
        @endif
    </div>
</div>
@endsection