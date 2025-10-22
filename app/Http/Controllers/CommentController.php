<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function show($id)
    {
        $thread = Thread::with('category', 'comments')->findOrFail($id);

        return view('threads.show', compact('thread'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'comment_text' => 'required|string|max:2000',
        ]);

        $threadId = $request->query('thread_id');
        $thread = Thread::findOrFail($threadId);

        // Get authenticated user or use default values
        $user = Auth::user();
        
        Comment::create([
            'thread_id' => $thread->id,
            'category_id' => $thread->category_id,
            'user_id' => $user?->id,
            'username' => $user?->name ?? 'Guest User',
            'user_image' => $user?->user_image,
            'comment_text' => $request->comment_text,
        ]);

        return redirect()->back()->with('success', 'Comment posted successfully!');
    }
}
