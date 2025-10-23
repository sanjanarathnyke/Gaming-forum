<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function index()
    {
        $forum = Thread::latest()->with('category')->get();
        $categories = Category::withCount('threads')->get();
        $total_threads = Thread::count();
        $total_members = 645;

        return view('forum', compact('forum', 'categories', 'total_threads', 'total_members'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'required|string|max:5000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('threads', 'public');
        }

        Thread::create([
            'user_id' => Auth::id(),
            'username' => Auth::user()->name,
            'image' => $imagePath,
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post created successfully!'
        ]);
    }
}
