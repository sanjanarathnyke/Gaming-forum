<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Get top 5 categories with most threads
        $topCategories = Category::withCount('threads')
            ->orderBy('threads_count', 'desc')
            ->take(5)
            ->get();

        // Get total registered users count
        $totalUsers = User::count();

        return view('welcome', [
            'topCategories' => $topCategories,
            'totalUsers' => $totalUsers
        ]);
    }
}

