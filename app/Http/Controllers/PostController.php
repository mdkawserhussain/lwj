<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user') ->latest()->paginate(6);
        return view("posts.index", ["posts" => $posts]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
        //dd(Auth::id());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd(Auth::id());
        $fields = $request->validate([
            "title" => "required|string|max:255",

            "body" => "required|string",

           
            
        ]);
        
        
        Auth::user()->posts()->create($fields);

        // $post = Post::create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'user_id' => Auth::id(), // Add this line to include the user_id
        // ]);
        

        //return redirect("/posts/{$post->id}");
        return redirect('/')->with('success', 'Post created successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.show", ["post" => $post]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Post $post)
    {
        return view("posts.edit", ["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , Post $post)
    {
        $fields = $request->validate([
            "title" => "required|string|max:255",
            "body" => "required|string",
        ]);
        $post->update($fields);
        return redirect("/posts/{$post->id}");
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect("/");
        
    }

    public function userPosts(User $user)
    {
        $posts = $user->posts()->latest()->paginate(6);
        return view("users.posts", ["posts" => $posts]);
    }
}
