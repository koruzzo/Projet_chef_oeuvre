<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Biography;
use App\Models\Comment;
use App\Http\Requests\StorePostRequest;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::all();
        $biographies = Biography::all();
        $posts = Post::all();
        $comments = Comment::all();
    
        return view('admins.dashboardAdmin', compact('users', 'biographies', 'posts', 'comments'));
    }

    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();

        $imageName = $validatedData['picture']->store('posts');
    
        Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'picture' => $imageName,
        ]);
        
    
        return redirect()->route('posts.dashboardAdmin')->with('success', 'Votre post a été créé');
    }
    
    public function create()
    {
        return view ('posts.create');
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

        return redirect()->route('posts.dashboardAdmin')->with('success', 'Votre post a été modifié');
    }

    public function destroyPost(Post $post)
    {
        $post->delete();
        return redirect()->route('admins.dashboardAdmin')->with('success', 'Votre post a été supprimé');
    } 
    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('admins.dashboardAdmin')->with('success', 'Votre user a été supprimé');
    }
    public function destroyBiography(Biography $biography)
    {
        $biography->delete();
        return redirect()->route('admins.dashboardAdmin')->with('success', 'Votre biographie a été supprimé');
    }
    public function destroyComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admins.dashboardAdmin')->with('success', 'Votre commentaire a été supprimé');
    }

}