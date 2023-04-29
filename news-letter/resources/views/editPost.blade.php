<title>Alter Post</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="col-md-6 offset-md-3">

                <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h1 style="font-size: 2em; font-weight:bold;"  class="text-6xl font-bold tracking-tight text-gray-900 sm:text-4xl">Altere uma novidade.</h1>
                </div>
                <form action="/post/update/{{$post->id}}" method="POST" enctype="multipart/form-data" class="mx-auto mt-16 max-w-xl sm:mt-20">
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <!-- Titulo -->
                    <div>
                        <label for="tittle" class="block text-sm font-semibold leading-6 text-gray-900">Título</label>
                        <div class="mt-2.5">
                        <input type="text" name="tittle" id="tittle" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$post->tittle}}">
                        </div>
                    </div>
                    <!-- Mensagem -->
                    <div class="sm:col-span-2">
                        <label for="content" class="block text-sm font-semibold leading-6 text-gray-900">Descrição</label>
                        <div class="mt-2.5">
                        <textarea name="content" id="content" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$post->content}}</textarea>
                        </div>
                    </div>
                    
                    <!-- imagem -->
                    <div>
                        <label for="content" class="block text-sm font-semibold leading-6 text-gray-900">Imagem</label>
                        @csrf              
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none light:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="image" name="image" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                        <img style="margin-top: 10px;" src="/img/post/{{$post->image}}" alt="{{$post->tittle}}">
                    </div>

                    </div>
                    <div class="mt-4" style="margin-bottom: 1em">
                    <button onClick="onClickSubmit()" type="submit" class="py-3 block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Alterar
                    </button>
                    </div>
                </form>
                </div>

            </div>
            </div>
        </div>
    </div>
</x-app-layout>
