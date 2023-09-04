<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(): View
    {
        return view('Comments.index', [
            'comments' => Comment::with('user')->latest()->get(),
        ]);
    } 

    public function create()
    {
    }

    public function store(StoreCommentRequest $request, Post $post)
    {
        $validatedData = $request->validated();

        $user = auth()->user();

        $comment = new Comment([
            'content' => $validatedData['content'],
            'user_id' => $user->id,
            'post_id' => $post->id
        ]);
        $comment->save();

        return redirect()->route('posts.show', $post->id)->with('success', 'Votre message a été envoyé.');
    }

    public function show(Comment $comment)
    {}

    public function edit(Comment $comment)
    {
        $this->authorize('isThatYourComment', $comment);

        return view('comments.edit', compact('comment'));
    }

    public function update(StoreCommentRequest $request, Comment $comment)
    {
        $this->authorize('isThatYourComment', $comment);

        $validatedData = $request->validated();

        $comment->update([
            'content' => $validatedData['content'],
        ]);

        return redirect()->route('posts.show', $comment->post)->with('success', 'Votre commentaire a été mis à jour.');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('isThatYourComment', $comment);
    
        $comment->delete();
    
        return redirect()->back()->with('success', 'Le message a été supprimé avec succès.');
    }
}
