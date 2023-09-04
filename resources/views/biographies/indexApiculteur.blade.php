<x-app-layout>
<form id="filter-form" action="{{ route('biographies.indexApiculteur') }}" method="GET" class="flex flex-col md:flex-row md:items-center mt-5 ml-5">
    @csrf
    <label for="role" class="mr-2">Choisissez un filtre :</label>
    <select name="role" id="role" class="px-3 py-1 border rounded-md mb-2 md:mb-0 md:mr-2 md:w-40 w-full">
        <option value="apiculteur" selected>Apiculteurs</option>
        <option value="apifan">Apifans</option>

    </select>
    <input type="text" name="search" placeholder="Nom ou ville..."
        class="px-3 py-1 border rounded-md mb-2 md:mb-0 md:mr-2">
    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Appliquer</button>
</form>

    <div class="container mx-auto p-4 lg:h-[800px]">
        <h1 class="text-3xl font-semibold">Annuaire des apiculteurs</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 flex ">
            @foreach($biographies as $biography)
                    <div class="flex-col bg-white rounded-lg shadow p-6">
                        <h2 class="text-xl font-semibold mb-2">{{ $biography->name }}</h2>
                        <p class="text-gray-600 mb-2">{{ $biography->ville }}</p>
                        <p class="text-gray-600 mb-2">{{ $biography->role }}</p>
                        <a href="{{ route('biographies.show', $biography->id) }}" class="text-blue-500 hover:underline mb-2">Voir la biographie</a>
                        @auth
                            @if (auth()->user()->id === $biography->id || auth()->user()->role === 'admin')
                                    <a href="{{ route('biographies.edit', $biography) }}" class="text-blue-500 hover:underline ml-5">Modifier la biographie</a>
                            @endif
                        @endauth
                    </div>
            @endforeach
        </div>
        <div class="flex w-full justify-center items-center mt-4">
            {{ $biographies->links('custom-pagination.custom-pagination') }}
        </div>
    </div>
</x-app-layout>