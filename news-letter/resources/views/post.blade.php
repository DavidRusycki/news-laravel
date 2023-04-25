@extends('layouts.main')

@section('title', 'Post')

@section('content')

    <style>
        .principal {
            margin-top: 1em;
        }
        .conteudo-central {
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .botaozinho {
            text-align: left;
            position: absolute;
            left: 381px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <div class="container principal conteudo-central">

        <div class="card" style="width: 70rem;">
            <div class="card-body" >
                <h5 class="card-title">{{$post->tittle}}</h5>
                <img src="/img/post/{{ $post->image }}" class="img-fluid" alt="{{ $post->title }}">
                <p class="card-text"><pre>{{$post->content}}</p>
                <form action="{{ $post->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Excluir">
                </form>
            </div>
        </div>
        <br>

        <div style="margin-bottom: 1em;">
            <span> {{count($comments )}} Comentários </span>
        </div>

        @foreach ($comments as $comment)
            <div class="card" style="width: 70rem;">
                <div class="card-body" >
                    <p class="card-text"><pre>{{$comment->content}}</p>
                </div>
            </div>
            <br>
        @endforeach


    </div>

@endsection