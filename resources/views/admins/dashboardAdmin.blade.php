<x-app-layout>
  <a href="{{ route('posts.create') }}" class="mx-auto w-1/4 text-center text-black font-bold py-3 px-4 rounded-md " style="background-color: rgba(209, 209, 209, 0.993);">Exprimez-vous !</a>
  <a href="{{ route('posts.dashboardApiculteur') }}" class="text-blue-500 hover:underline ml-5">Tableau de bord apiculteur</a>
  <h1 class="p-5 font-exo-2 font-bold flex justify-center text-xl">Tableau de bord administratif</h1>
  <h2 class="p-5 font-exo-2 font-bold flex justify-center">Liste des utilisateurs</h2>
  <section class="md:h-48 h-48 flex justify-center w-full p-2">
    <div class="border rounded-lg bg-white overflow-y-scroll flex flex-col md:w-2/3 lg:w-1/2 w-full">
      <table >
        <thead>
          <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr class="border">
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->role }}</td>
              <td>
                @if ($user->id !== auth()->user()->id)
                  <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Supprimer</button>
                  </form>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
  <h2 class="p-5 font-exo-2 font-bold flex justify-center">Liste des posts</h2>
  <section class="md:h-48 h-48 flex justify-center w-full p-2">
    <div class="border rounded-lg bg-white overflow-y-scroll flex flex-col md:w-2/3 lg:w-1/2 w-full">
      <table>
        <thead>
          <tr>
            <th>title</th>
            <th>content</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
              <tr class="border">
                <td>{{ Str::limit($post->title, 20) }}</td>
                <td>{{ Str::limit($post->content, 70) }}</td>
                <td>
                  <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Supprimer</button>
                  </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
  <h2 class="p-5 font-exo-2 font-bold flex justify-center">Liste des commentaires</h2>
  <section class="md:h-48 h-48  flex justify-center w-full p-2">
    <div class="border rounded-lg bg-white overflow-y-scroll flex flex-col md:w-2/3 lg:w-1/2 w-full">
      <table>
        <thead>
          <tr>
            <th>content</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($comments as $comment)
            <tr class="border">
              <td>{{ Str::limit($comment->content, 80) }}</td>
              <td>
                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500">Supprimer</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
  <h2 class="p-5 font-exo-2 font-bold flex justify-center">Liste des biographies</h2>
  <section class="md:h-48 h-48  flex justify-center w-full p-2">
    <div class="border rounded-lg bg-white overflow-y-scroll flex flex-col md:w-2/3 lg:w-1/2 w-full">
      <table>
        <thead>
          <tr>
              <th>Nom</th>
              <th>Rôle</th>
              <th>Titre</th>
              <th>Contenue</th>
              <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($biographies as $biography)
            <tr class="border">
              <td>{{ Str::limit($biography->user->name,20) }}</td>
              <td>{{ $biography->user->role }}</td>
              <td>{{ Str::limit($biography->title, 20) }}</td>
              <td>{{ Str::limit($biography->content, 50) }}</td>
              <td>
                <form action="{{ route('admin.biographies.destroy', $biography->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit"  class="text-red-500">Supprimer</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
</x-app-layout>
