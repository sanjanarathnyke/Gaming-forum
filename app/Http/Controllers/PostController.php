<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
{
    $forum = Thread::with('category', 'comments.user')->findOrFail($id);
    // dd($forum);

    return view('post', compact('forum'));
}

}
