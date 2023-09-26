<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
         $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image',
        ]);
        $image = $request->file('image');


        $post = new Post([
            'content' => $request->input('content'),
            'title' => $request->input('title'),
            'user_id' => Auth::user()->id,
        ]);

        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $imageName);
            $post->image = $imageName;
        }
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', ["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit',["post"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
    
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'image', // Allow image update, but not required
        ]);
    
        // Update post fields
        $post->title = $request->input('title');
        $post->content = $request->input('content');
    
        $image = $request->file('image');
        if ($image) {
            // Delete old image if exists
            if ($post->image) {
                $oldImagePath = public_path('images/posts') . '/' . $post->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $imageName);
            $post->image = $imageName;
        }
    
        $post->save();
    
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
