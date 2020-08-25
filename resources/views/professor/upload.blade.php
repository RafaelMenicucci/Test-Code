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
    <div class="card-header">Fazer Upload do Projeto para Disciplina: {{ $disciplina }}</div>
    <!-- <input id="disciplina" hidden type="text" name="disciplina" value='disciplina'> -->
    <div class="card-body">
        <form action="{{ route('fazerUploadProjeto',$disciplina) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

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
