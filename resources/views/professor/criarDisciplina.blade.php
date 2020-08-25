@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">{{ __('Criar Disciplina') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('disciplina') }}">
                        @csrf   

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

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
                            <label for="anoPeriodo" class="col-md-4 col-form-label text-md-right">{{ __('Ano/Período') }}</label>

                            <div class="col-md-6">
                                <input id="anoPeriodo" type="text" class="form-control @error('anoPeriodo') is-invalid @enderror" name="anoPeriodo" value="{{ old('anoPeriodo') }}" required autocomplete="anoPeriodo" autofocus>

                                @error('anoPeriodo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Criar a Disciplina') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
