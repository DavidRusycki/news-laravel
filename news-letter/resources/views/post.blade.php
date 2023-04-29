<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div>                        
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
                        .butaovermelho:hover {
                            background-color: #9b0606 !important;
                        }
                        .butaoverde:hover {
                            background-color: #0d6e0d !important;
                        }
                    </style>

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

                    <div class="container principal conteudo-central">

                        <div class="card" style="width: 70rem;">
                            <div class="card-body" >
                                <h5 class="card-title">{{$post->tittle}}</h5>
                                <img src="/img/post/{{ $post->image }}" class="img-fluid" alt="{{ $post->title }}">
                                <p class="card-text"><pre>{{$post->content}}</pre></p>
                                <!-- somente para admins -->
                                @if ($user->isAdmin())
                                    <div style="display: flex;flex-direction: row;align-items: center;">
                                        <form action="{{ $post->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button style="margin-right: 1em;color: white; background-color: #c31818;" type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" value="Excluir">
                                            Excluir
                                            </button>
                                        </form>
                                        <form action="/post/edit/{{$post->id}}" method="GET">
                                            @csrf
                                            @method('GET')
                                            <button style="color: white; background-color: #ffbc00;" type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" value="Alterar">
                                            Alterar    
                                            </button>

                                        </form>
                                    </div>
                                @endif
                                @if (!$user->isAdmin())
                                    <div style="display: flex;flex-direction: row;align-items: center;">
                                        <form action="/like/{{$post->id}}" method="GET">
                                            @csrf
                                            @method('GET')
                                            <button value="1" name="tipo" type="submit" style="color: white; background-color: #01af0e;margin-right: 1em;" class="butaoverde bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 10V20M8 10L4 9.99998V20L8 20M8 10L13.1956 3.93847C13.6886 3.3633 14.4642 3.11604 15.1992 3.29977L15.2467 3.31166C16.5885 3.64711 17.1929 5.21057 16.4258 6.36135L14 9.99998H18.5604C19.8225 9.99998 20.7691 11.1546 20.5216 12.3922L19.3216 18.3922C19.1346 19.3271 18.3138 20 17.3604 20L8 20" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                <span>{{$likes}}</span>
                                            </button>
                                        </form>
                                        <form action="/dislike/{{$post->id}}" method="GET">
                                            @csrf
                                            @method('GET')
                                            <button value="2" name="tipo" type="submit"  style="color: white; background-color: #c31818;" class="butaovermelho bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 14V4M8 14L4 14V4.00002L8 4M8 14L13.1956 20.0615C13.6886 20.6367 14.4642 20.884 15.1992 20.7002L15.2467 20.6883C16.5885 20.3529 17.1929 18.7894 16.4258 17.6387L14 14H18.5604C19.8225 14 20.7691 12.8454 20.5216 11.6078L19.3216 5.60779C19.1346 4.67294 18.3138 4.00002 17.3604 4.00002L8 4" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                <span>{{$dislikes}}</span>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <br>
                        
                        <form class="w-full bg-white rounded-lg px-4 pt-2" action="/comment/{{$post->id}}" method="GET">
                        @csrf
                        @method('GET')
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Adicione um novo comentário</h2>
                                <div class="w-full md:w-full px-3 mb-2 mt-2">
                                    <textarea name="content" placeholder='Digite o seu comentário' required class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"></textarea>
                                </div>
                                <div class="w-full md:w-full flex items-start md:w-full px-3">
                                    <div class="-mr-1">
                                    <input style="margin-bottom: 1em;" value="Comentar" type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">
                                </div>
                            </div>
                        </form>
                        <div style="margin-left: 1em;margin-bottom: 1em;">
                            <span> {{count($comments )}} Comentários </span>
                        </div>

                        
                        @foreach ($comments as $comment)
                            <div style="display: flex;flex-direction: column;" class="flex mx-auto items-center justify-center shadow-lg mt-56 mx-8 mb-4 max-w-lg">
                                <div class="card" style="width: 70rem;">
                                        <div class="mx-auto max-w-7xl px-6 lg:px-8">
                                            <div style="margin-top:1em;">
                                                <p style="font-weight:bold;">
                                                    {{$comment->user->name}}
                                                </p>    
                                                <p style="color: #bfbfbf;margin-bottom:1em;"> 
                                                    {{$comment->created_at}}
                                                </p>
                                            </div>
                                        </div> 
                                </div>
                                
                                <div class="card-body" style="width: 100%;margin-left: 4em;margin-bottom:1em;">
                                    <p class="card-text">{{$comment->content}}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>
            

            </div>
        </div>
    </div>
</x-app-layout>
=