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
                        <div style="text-align: center; margin-bottom: 1em;">    
                            <div id="search-container" class="col-md-12">
                                <h1 style="font-size: 2em; font-weight:bold;" class="pt-4">
                                    Busque por uma Newsletter
                                </h1>
                                <form action="/posts" method="GET" class="py-4">
                                    <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
                                </form>
                            </div>
                            <span >
                                Número total de posts: {{count($posts)}}
                            </span>
                        </div>
                        <div class="conteudo-central row">
                            @foreach ($posts as $post)

                            <div class="w-60 rounded overflow-hidden shadow-lg ml-6 mb-6">
                                <img style="height: 10em" class="w-full h-24" src="/img/post/{{ $post->image }}" alt="image">
                                <div class="px-6 py-4" style="height: 3em">
                                    <div class="font-bold text-xl mb-2">{{$post->tittle}}</div>
                                </div>
                                <div class="py-4">
                                    <a  href="{{url("/posts/{$post->id}")}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-blue bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Veja mais
                                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </div>
                            </div>
                                
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
