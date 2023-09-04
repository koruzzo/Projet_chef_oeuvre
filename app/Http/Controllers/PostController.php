<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%$search%")
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                })
                ->orWhereDate('created_at', $search);
        }
    
        $sort = $request->input('sort', 'latest');
        if ($sort == 'oldest') {
            $query->oldest();
        } else {
            $query->latest();
        }
    
        $posts = $query->paginate(6);
    
        return view('posts.index', compact('posts'));
    }

    public function indexDashboardApiculteur()
    {
        $posts = auth()->user()->posts;

        return view('posts.dashboardApiculteur', compact('posts'));
    }

    public function contactezNous()
    {
        return view('footerlinks.contacteznous');
    }

    public function mentionsLegals()
    {
        return view('footerlinks.mentions');
    }

    public function giveInfos()
    {
        $apiculteurCount = User::where('role', 'apiculteur')->count();
        $apifanCount = User::where('role', 'apifan')->count();
    
        return view('home', compact('apiculteurCount','apifanCount'));
    }



    public function create()
    {
        return view ('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();

        $imageName = $validatedData['picture']->store('posts');
    
        Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'picture' => $imageName,
            'user_id' => auth()->id()
        ]);
        
        return redirect()->route('posts.dashboardApiculteur')->with('success', 'Votre post a été créé');
    }
    

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('isThatYourPost', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $this->authorize('isThatYourPost', $post);

        $validatedData = $request->validated();

        $arrayUpdate = [
            'title' => $validatedData['title'],
            'content' => $validatedData['content']
        ];

        if ($request->hasFile('picture')) {
            $imageName = $validatedData['picture']->store('posts');

            $arrayUpdate['picture'] = $imageName;
        }

        $post->update($arrayUpdate);

        return redirect()->route('posts.dashboardApiculteur')->with('success', 'Votre post a été modifié');
    }

    public function destroy(Post $post)
    {
        $this->authorize('isThatYourPost', $post);
    
        $post->delete();
    
        return redirect()->route('posts.dashboardApiculteur')->with('success', 'Votre post a été supprimé');
    }
    public function destroyIndex(Post $post)
    {
        $this->authorize('isThatYourPost', $post);
    
        $post->delete();
    
        return redirect()->back()->with('success', 'Votre post a été supprimé');
    }
}
