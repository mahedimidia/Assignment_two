<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class homeController extends Controller
{
    public function index()
    {
        
        return view('home.home');
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function categories(Request $request)
    {
        // Default sort = newest
        $sort = $request->get('sort', 'newest');

        $query = Post::with('category');

        // Apply sorting
        switch ($sort) {
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'popular':
                $query->orderBy('views', 'desc'); // make sure you have "views" column
                break;
            
            default: // newest
                $query->orderBy('created_at', 'desc');
        }

        $posts = $query->paginate(5)->appends(['sort' => $sort]); // keep sort in pagination links
        $categories = Category::all();

        return view('home.categories', compact('posts', 'categories', 'sort'));
    }


      public function login()
    {
        return view('home.login');
    }

      public function registration()
    {
        return view('home.registration');
    }

       public function user_login()
    {
        return view('home.profile');
    }
}
