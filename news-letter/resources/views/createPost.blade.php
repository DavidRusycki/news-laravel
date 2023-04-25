@extends('layouts.main')

@section('title', 'Novo Post')

@section('content')

<div class="col-md-6 offset-md-3">
    <h1>O que há de news?</h1>
    <form action="/posts" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="tittle">Título:</label>
            <input type="text" class="form-control" id="tittle" name="tittle" placeholder="Título" required>
        </div>
        <div class="form-group">
            <label for="content">Descrição:</label>
            <input type="text" class="form-control" id="content" name="content" placeholder="Descrição" required>
        </div>
        <input onClick="onClickSubmit()" type="submit" class="btn btn-primary" value="Criar" style="margin-top: 10px;">
    </form>
</div>

@endsection