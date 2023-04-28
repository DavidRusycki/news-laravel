
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
            </div>
        </div>
    </div>
</x-app-layout>
