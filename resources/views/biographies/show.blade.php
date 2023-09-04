<x-app-layout>
    <div class="my-5">
        @foreach ($errors->all() as $error)
            <span class=>{{$error}}</span> 
        @endforeach
    </div>
    <div class="bg-gray-100 py-8 ">
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg ">
                <div class="px-6 py-8">
                    <div class="text-center">
                        <img class="h-60 w-60 rounded-full border-4 border-black mx-auto" src="{{ asset('/storage/'.$biography->picture) }}" alt="Photo de profil">
                        <h2 class="text-xl font-semibold">{{ $biography->user->name }}</h2>
                        <p class="text-gray-800 text-xl font-bold">Api-points: {{ $biography->pointsCount() }}</p>
                        <p class="text-gray-600">{{ $biography->user->role }}</p>
                        <p class="text-gray-600">{{ $biography->user->ville }}</p>
                    </div>
                    <div class="mt-8 text-gray-800">
                        @auth
                            @if ($biography->id !== auth()->user()->id)
                                @if (!$biography->userWithPoint->contains(auth()->user()))
                                    <form action="{{ route('biographies.addpoint', $biography) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="mb-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Ajouter un point
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('biographies.delpoint', $biography) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mb-5 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Retirer un point
                                        </button>
                                    </form>
                                @endif
                            @endif
                        @endauth
                        <h1 class="text-2xl font-semibold mb-4">{{ $biography->title }}</h1>
                        <p class="text-lg">{{ $biography->content }}</p>
                        @auth
                        <p class="text-lg">{{ $biography->secret }}</p>
                        @endauth
                    </div>
                    @auth
                        @if (auth()->user()->id === $biography->user->id || auth()->user()->role === 'admin')
                            <div class="mt-4">
                                <a href="{{ route('biographies.edit', $biography) }}" class="text-blue-500 hover:underline">Modifier la biographie</a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
