<x-app-layout>

    <div class="my-5">
        @foreach ($errors->all() as $error)
            <span class=>{{$error}}</span> 
        @endforeach
    </div>


    <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data" class="p-4 mx-auto mt-5 w-full md:w-3/4 lg:w-1/2 xl:w-2/3 flex justify-center flex-col formu-style font-exo-2"> 
        @csrf
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4">Création de post avec {{auth()->user()->name}}</h1>


        <label for="title" class="p-2 md:p-4">Titre de votre post :</label>
        <input id="title" name="title" class="rounded-lg p-2 md:p-4" value="{{ $post->title }}">
        @error('title')
            <span class="text-red-600">{{ $message }}</span>
        @enderror

        <label for="content" class="p-2 md:p-4 mt-5">Contenu du post :</label>
        <textarea id="content" name="content" class="rounded-lg h-40 p-2 md:p-4" >{{ $post->content }}</textarea>
        @error('content')
            <span class="text-red-600">{{ $message }}</span>
        @enderror

        <div class="dispo-image">
            <label for="picture" class="p-2 md:p-4 label-image dispo-image">Changer l'image de profil :
                <img src="{{ asset('/storage/' . $post->picture) }}" alt="Image de profil actuelle" class="w-32 h-32 rounded-full">
                <input id="picture" type="file" name="picture" class="p-2 md:p-4">
            </label>
            @error('picture')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
            
        </div>
        <button type="submit" class="font-semibold py-2 px-4 border bg-white rounded-lg mt-6 w-full md:w-1/2 xl:w-1/3 mx-auto">Envoyer</button>
    </form>
</x-app-layout>