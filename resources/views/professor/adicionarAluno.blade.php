@extends('layouts.app')

@section('content')

@if (session('erro'))
<div class="alert alert-danger fade show" role="alert">
        {{ session('erro') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card">
    <div class="card-header">{{ __('Adicionar Alunos da Disciplina ') }}{{ $disciplina }}</div>
    
    <div class="card-body">
        <form method="POST" action="{{ route('buscarAluno',$disciplina) }}">
            @csrf

            <div class="form-group row">
                <label for="aluno" class="col-md-4 col-form-label text-md-right">{{ __('Aluno') }}</label>

                <div class="col-md-6">
                    <input id="aluno" type="text" class="form-control @error('aluno') is-invalid @enderror" name="aluno" value="{{ old('aluno') }}" required autocomplete="aluno" autofocus>

                    @error('aluno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Buscar Aluno') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@if(!$alunosBuscados->isEmpty() && !$alunosBuscados->contains('false'))
    <div class='card'>
        <div class='card-header'>Alunos Buscados</div>

        <div class='card-body'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Matricula</th>
                            <th scope="col">Email</th>
                            <th scope="col">Adicionar</th>
                        </tr>
                    </thead>
                @foreach($alunosBuscados as $aluno)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $aluno->nome }}</th>
                            <td>{{ $aluno->matricula }}</td>
                            <td>{{ $aluno->email }}</td>
                            @if(!$usuariosDisciplina->isEmpty())
                                @foreach($usuariosDisciplina as $usuarioDisciplina)
                                    @if($aluno->id==$usuarioDisciplina->id)
                                        <td><a href="{{ route('removerAluno',['disciplina'=>$disciplina,'aluno_id'=>$aluno->id]) }}" class="btn btn-danger material-icons">clear</a></td>
                                        @break;
                                    @else
                                        @if($loop->last)
                                        <td><a href="{{ route('adicionarAluno',['disciplina'=>$disciplina,'aluno_id'=>$aluno->id]) }}" class="btn btn-success material-icons">add</a></td>
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                <td><a href="{{ route('adicionarAluno',['disciplina'=>$disciplina,'aluno_id'=>$aluno->id]) }}" class="btn btn-success material-icons">add</a></td>
                            @endif
                        </tr>
                    </tbody>
                @endforeach
                </table>
        </div>
@else
    @if(!$alunosBuscados->contains('false'))
        <div class="alert alert-danger fade show" role="alert">
            Aluno não encontrado.
        </div>
    @endif
@endif

<div class='card'>
    <div class='card-header'>Alunos Adicionados à Disciplina</div>

    <div class='card-body'>
        @if(!$usuariosDisciplina->isEmpty())
            <table class='table'>
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Matricula</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
            @foreach($usuariosDisciplina as $usuarioDisciplina)
                <tbody>
                    <tr>
                        <th scope="row">{{ $usuarioDisciplina->nome }}</th>
                        <td>{{ $usuarioDisciplina->matricula }}</td>
                        <td>{{ $usuarioDisciplina->email }}</td>
                    </tr>
                </tbody>
            @endforeach
            </table>
        @else
            Não existem alunos adicionados na Disciplina.
        @endif
    </div>
@endsection
