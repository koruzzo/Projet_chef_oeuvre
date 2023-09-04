
<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold">Modifier le Commentaire</h1>

        <form action="{{ route('comments.update', $comment) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <label for="content" class="block text-gray-700 text-sm font-bold">Contenu du Commentaire</label>
                <textarea id="content" name="content" rows="4" class="form-input mt-1 block w-full" required>{{ $comment->content }}</textarea>
            </div>

            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Mettre à jour</button>
            </div>
        </form>
    </div>
</x-app-layout>