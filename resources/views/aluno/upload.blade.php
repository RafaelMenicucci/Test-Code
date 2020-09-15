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
@if (session('erro'))
    <div class="alert alert-danger fade show" role="alert">
        {{ session('erro') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="card">
    <div class="card-header">Fazer Upload da sua resposta.</div>
    <div class="card-body">
        <form action="{{ route('enviarResposta') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input id="disciplina" hidden type="text" hidden name="disciplina" value="{{$disciplina}}">
            <input id="nomeProva" hidden type="text" hidden name="nomeProva" value="{{$prova_nome}}">
            <div class="form-group">
                <label for="featured">Projeto</label>
                <input type="file" id='featured' name="featured" class="form-control">
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Upload Projeto
                    </button>
                </div>
            </div>
            <div>
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
