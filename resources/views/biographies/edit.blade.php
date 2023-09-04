<x-app-layout>
    <div class="my-5">
        @foreach ($errors->all() as $error)
            <span class=>{{$error}}</span> 
        @endforeach
    </div>
    <form action="{{ route('biographies.update', $biography) }}" method="post" enctype="multipart/form-data" class="p-4 mx-auto mt-5 w-full md:w-3/4 lg:w-1/2 xl:w-2/3 flex justify-center flex-col formu-style font-exo-2"> 
        @csrf
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4">Biographie de {{$biography->user->name}}</h1>

        <label for="title" class="p-2 md:p-4">Modifier le titre de votre biographie :</label>
        <input id="title" name="title" class="rounded-lg p-2 md:p-4" value="{{ $biography->title }}">
        @error('title')
            <span class="text-red-600">{{ $message }}</span>
        @enderror

        <label for="content" class="p-2 md:p-4 mt-5">Modifier le contenu de la biographie :</label>
        <textarea id="content" name="content" class="rounded-lg h-40 p-2 md:p-4">{{ $biography->content }}</textarea>
        @error('content')
            <span class="text-red-600">{{ $message }}</span>
        @enderror

        <label for="secret" class="p-2 md:p-4 mt-5">Modifier le secret de la biographie :</label>
        <textarea id="secret" name="secret" class="rounded-lg h-40 p-2 md:p-4 mb-5">{{ $biography->secret }}</textarea>
        @error('secret')
            <span class="text-red-600">{{ $message }}</span>
        @enderror
        
        <div class="dispo-image">
            <label for="picture" class="p-2 md:p-4 label-image dispo-image">Changer l'image de profil :
                <img src="{{ asset('/storage/' . $biography->picture) }}" alt="Image de profil actuelle" class="w-32 h-32 rounded-full">
                <input id="picture" type="file" name="picture" class="p-2 md:p-4">
            </label>
            @error('picture')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
            
            <button type="submit" class="font-semibold py-2 px-4 border bg-white rounded-lg mt-6 w-full md:w-1/2 xl:w-1/3 mx-auto">Modifier la biographie</button>
        </div>
    </form>
</x-app-layout>
