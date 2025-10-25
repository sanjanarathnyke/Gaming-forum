<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        
        // Get user's threads with their categories and comments count
        $threads = Thread::where('user_id', $user->id)
            ->with('category', 'comments')
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Get user's comments with related thread information
        $comments = Comment::where('user_id', $user->id)
            ->with('thread')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('profile', compact('user', 'threads', 'comments'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string|max:500'
        ]);

        // Handle image upload
        if ($request->hasFile('user_image')) {
            // Delete old image if exists
            if ($user->user_image) {
                Storage::disk('public')->delete($user->user_image);
            }
            
            $validated['user_image'] = $request->file('user_image')->store('user-images', 'public');
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function deleteThread($id)
    {
        $thread = Thread::findOrFail($id);
        
        // Check if the user owns this thread
        if ($thread->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Delete thread image if exists
        if ($thread->image) {
            Storage::disk('public')->delete($thread->image);
        }

        // Delete thread and its comments (cascade)
        $thread->delete();

        return redirect()->route('profile')->with('success', 'Thread deleted successfully!');
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        
        // Check if the user owns this comment
        if ($comment->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $comment->delete();

        return redirect()->route('profile')->with('success', 'Comment deleted successfully!');
    }

    public function editComment($id)
    {
        $comment = Comment::findOrFail($id);
        
        // Check if the user owns this comment
        if ($comment->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        return response()->json($comment);
    }

    public function updateComment(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        
        // Check if the user owns this comment
        if ($comment->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $validated = $request->validate([
            'comment_text' => 'required|string|max:2000'
        ]);

        $comment->update($validated);

        return redirect()->route('profile')->with('success', 'Comment updated successfully!');
    }

    public function editThread($id)
    {
        $thread = Thread::findOrFail($id);
        
        // Check if the user owns this thread
        if ($thread->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $categories = Category::all();
        return view('edit-thread', compact('thread', 'categories'));
    }

    public function updateThread(Request $request, $id)
    {
        $thread = Thread::findOrFail($id);
        
        // Check if the user owns this thread
        if ($thread->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($thread->image) {
                Storage::disk('public')->delete($thread->image);
            }
            
            $validated['image'] = $request->file('image')->store('thread-images', 'public');
        }

        $thread->update($validated);

        return redirect()->route('profile')->with('success', 'Thread updated successfully!');
    }
}
