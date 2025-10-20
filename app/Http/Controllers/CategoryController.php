<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $total_categories = $categories->count();
        $total_threads = Thread::count();
        return view('categories', compact('categories', 'total_categories', 'total_threads'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully!',
        ]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully!',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $category = Category::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Category added successfully!',
            'category' => $category,
        ]);
    }
}
