<x-app-layout>

<form action="{{ route('posts.index') }}" method="GET" class="flex flex-col md:flex-row md:items-center mt-5 ml-5">
    @csrf
    <label for="search" class="mr-2">Choisissez un filtre :</label>
    <input type="text" id="search" name="search" placeholder="Titre, date, nom..." class="px-3 py-1 border rounded-md mb-2 md:mb-0 md:mr-2">
    <select name="sort" class="px-3 py-1 border rounded-md mb-2 md:mb-0 md:mr-2 md:w-40 w-full">
        <option value="latest">Derniers articles</option>
        <option value="oldest">Plus anciens articles</option>
    </select>
    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Rechercher</button>
</form>

@auth
    @if (auth()->user()->role === 'apiculteur')
        <a href="{{ route('posts.create') }}" class="text-blue-800 mt-2 text-xl block p-2">Exprimez-vous !</a>
    @endif
@endauth

    <section class="text-gray-600 body-font lg:h-[950px]">
        <div class="container px-5 py-5 mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($posts as $post)
                    <div class="h-full border-2 border-gray-300 border-opacity-50 rounded-lg overflow-hidden">
                        <div class="p-4 h-[130px]">
                            <h2 class="tracking-widest text-xl title-font font-bold text-gray-900 mb-2 uppercase">{{ Str::limit($post->title, 40) }}</h2>
                            <p class="text-gray-500 mb-3">{{ Str::limit($post->content, 80) }}</p>
                        </div>

                        <img class="w-full object-cover object-center h-48 md:h-50"
                            src="{{ asset('/storage/'.$post->picture) }}" alt="Image de couverture d'un post">

                        <div class="w-full">
                            <div class="w-full flex p-2">
                                <div class="pl-2 pt-2">
                                    @if ($post->user)
                                        <p class="font-semibold">{{ $post->user->name }}</p>
                                    @else
                                        <p class="font-semibold">Erreur!! perte de données</p>
                                    @endif
                                    <p class="text-xs text-gray-400 mb-2">{{ $post->created_at->format('d M Y') }}</p>
                                    <a href="{{ route('posts.show', $post) }}" class="text-blue-800 mt-2 text-sm block">Consulter l'article</a>
                                </div>
                            </div>
                            @auth
                            @if (auth()->user()->id === $post->id || auth()->user()->role === 'admin')
                                <a href="{{ route('posts.edit', $post) }}" class="text-blue-500 hover:underline ml-5">Modifier la biographie</a>
                                <form method="POST" action="{{ route('posts.destroyIndex', $post) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline ml-5">Supprimer la biographie</button>
                                </form>
                            @endif
                        @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="flex w-full justify-center items-center mt-4">
        {{ $posts->links('custom-pagination.custom-pagination') }}
    </div>
</x-app-layout>