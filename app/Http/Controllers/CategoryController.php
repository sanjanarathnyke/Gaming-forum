<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index() {
    $categories = Category::all();
    return view('categories', compact('categories'));
}

public function store(Request $request) {
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
