@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-info fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="container">
            <div class="card">
                <div class="card-header">Dar Permissão</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('buscarusuario') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('Usuário') }}</label>

                            <div class="col-md-6">
                                <input id="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{ old('usuario') }}" required autocomplete="usuario" autofocus>

                                @error('usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Buscar Usuário') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@if(!$usuariosBuscados->isEmpty() && !$usuariosBuscados->contains('false'))
    <div class='card'>
        <div class='card-header'>Usuários Buscados</div>

        <div class='card-body'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Dar Permissão</th>
                        </tr>
                    </thead>
                @foreach($usuariosBuscados as $usuario)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $usuario->nome }}</th>
                            <td>{{ $usuario->email }}</td>
                            @if($usuario->is_Admin==1)
                                <td><a href="{{ route('tirarPermissao',['id'=>$usuario->id]) }}" class="btn btn-danger material-icons">clear</a></td>
                            @else
                                <td><a href="{{ route('darPermissao',['id'=>$usuario->id]) }}" class="btn btn-success material-icons">add</a></td>
                            @endif
                        </tr>
                    </tbody>
                @endforeach
                </table>
        </div>
@else
    @if(!$usuariosBuscados->contains('false'))
        <div class="alert alert-danger fade show" role="alert">
            Usuário não encontrado.
        </div>
    @endif
@endif
</div>
@endsection
