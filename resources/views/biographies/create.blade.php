<x-app-layout>

    
    <div class="my-5">
        @foreach ($errors->all() as $error)
            <span class=>{{$error}}</span> 
        @endforeach
    </div>


    <form action="{{ route('biographies.store') }}" method="post" enctype="multipart/form-data" class="p-4 mx-auto mt-5 w-full md:w-3/4 lg:w-1/2 xl:w-2/3 flex justify-center flex-col formu-style font-exo-2"> 
        @csrf
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4">Création de la biographie de {{auth()->user()->name}}</h1>


        <label for="title" class="p-2 md:p-4">Titre de votre biographie :</label>
        <input id="title" name="title" class="rounded-lg p-2 md:p-4">
        @error('title')
            <span class="text-red-600">{{ $message }}</span>
        @enderror

        <label for="content" class="p-2 md:p-4 mt-5">Contenu de la biographie :</label>
        <textarea id="content" name="content" class="rounded-lg h-40 p-2 md:p-4"></textarea>
        @error('content')
            <span class="text-red-600">{{ $message }}</span>
        @enderror


        <label for="secret" class="p-2 md:p-4 mt-5">Texte secret de la biographie :</label>
        <textarea id="secret" name="secret" class="rounded-lg h-40 p-2 md:p-4 mb-5"></textarea>
        @error('secret')
            <span class="text-red-600">{{ $message }}</span>
        @enderror


        <div class="dispo-image">
            <label for="picture" class="p-2 md:p-4 label-image dispo-image">Votre image de profil :
                <div class="w-32 h-32 rounded-full border-black"><p>Cliquez ICI</p></div>
                
            </label><input id="picture" type="file" name="picture" class="p-2 md:p-4">
            @error('picture')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
            
        </div>
        <button type="submit" class="font-semibold py-2 px-4 border bg-white rounded-lg mt-6 w-full md:w-1/2 xl:w-1/3 mx-auto">Envoyer</button>
    </form>
</x-app-layout>
