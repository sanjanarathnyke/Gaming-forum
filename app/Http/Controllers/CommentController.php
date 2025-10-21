<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Http\Request;
use App\Models\User;

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

        Comment::create([
            'thread_id' => $thread->id,
            'category_id' => null,
            'user_id' => null,
            'username' => null,
            'user_image' => null,
            'comment_text' => $request->comment_text,
        ]);

        return redirect()->back()->with('success', 'Comment posted successfully!');
    }
}
