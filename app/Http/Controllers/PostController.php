<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Posts = Post::with('Category')->orderBy('id','desc')->paginate(5);
        return view('admin.allPost', compact('Posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.addPost', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->only(['title', 'content', 'category_id']);

        if ($request->hasFile('image')) {
           $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();

            $data['image'] = $request->file('image')->storeAs('posts',$imageName, 'public');
        }

        Post::create($data);

        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('admin.editPost', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->only(['title', 'content', 'category_id']);

        if ($request->hasFile('image')) {
            // পুরনো image delete
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            // নতুন image upload
            $data['image'] = $request->file('image')->storeAs('posts',$imageName, 'public');
        }

        $post->update($data);

        return redirect()->route('post.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // যদি image থাকে তাহলে ফাইলও delete
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post deleted successfully!');
    }

    /**
     * Display the specified resource (optional).
     */
   
}
