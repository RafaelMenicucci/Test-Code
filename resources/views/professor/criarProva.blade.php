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
                <div class="card-header">Criar Prova da Disciplina {{$disciplina}} sobre o Projeto {{$nomeProjeto}}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('criarProva',['disciplina'=>$disciplina,'nomeProjeto'=>$nomeProjeto]) }}">
                        @csrf   

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome Prova') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="dataLimite" class="col-md-4 col-form-label text-md-right">{{ __('Data Limite') }}</label>

                            <div class="col-md-6">
                                <input id="dataLimite" type="date" class="form-control @error('dataLimite') is-invalid @enderror" name="dataLimite" value="{{ old('dataLimite') }}" required autocomplete="dataLimite" autofocus>

                                @error('dataLimite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="featured">Prova</label>
                            <input type="file" id='featured' name="featured" class="form-control">
                            @error('featured')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Criar Prova') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
