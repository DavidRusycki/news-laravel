<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               
                    <style>
                        .principal {
                            margin-top: 1em;
                        }
                        
                        .conteudo-central {
                            display: flex;
                            justify-content: center;
                        }

                        .botaozinho {
                            /* text-align: left; */
                            /* position: absolute;
                            left: 381px; */
                        }
                    </style>

                </head>
                <body class="antialiased">
                    <div class="container principal">
                        <div id="search-container" class="col-md-12">
                            <h1>Busque uma Newsletter.</h1>
                            {{$id}}
                            <form action="/posts" method="GET">
                                <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
                            </form>
                        </div>
                        <div style="text-align: center; margin-bottom: 1em;">    
                            <span >
                                Número de posts: {{count($posts)}}
                            </span>
                        </div>
                        <div class="conteudo-central row">
                            @foreach ($posts as $post)
                                <div class="col-md-2" style="width: 22rem; margin: 1em;">
                                    <div class="card">
                                        <img style="height: 200px !important;" src="/img/post/{{ $post->image }}" class="card-img-top img-fluid" alt="{{ $post->title }}">
                                        <div class="card-body" >
                                            <h5 class="card-title">{{$post->tittle}}</h5>
                                            <p class="card-text"><pre>{{$post->content}}</p>
                                            <a href="{{url("/posts/{$post->id}")}}" class="btn btn-primary botaozinho">Go To</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
