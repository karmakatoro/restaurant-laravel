<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'user')->latest()->get();
        $categories = Category::all();
        $users =  User::all();
        return view('posts.index', compact('posts', 'categories', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $imageName = $request->image->store('posts');
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName
        ]);
        return redirect()->route('posts.create')->with('success', 'Votre post a ete cree');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(Gate::denies('update-post', $post)){
            abort('403');
        }
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
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
        $categories = Category::all();
        $arrayUpdate = [
            'title' => $request->title,
            'content' => $request->content
        ];
        if($request->image != null){
            $imageName = $request->image->store('posts');
            $arrayUpdate = array_merge($arrayUpdate, [
                'image' => $imageName
            ]);
        }
        $post->update($arrayUpdate);

        return redirect()->route('posts.edit', compact('post', 'categories'))->with('success', 'Votre post a ete modifiee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(Gate::denies('destroy-post', $post)){
            abort('403');
        }

        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Votre post a ete supprimee');
    }
}
