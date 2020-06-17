<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::has('category')->paginate(10);
        return view('post.index')->with('posts', $posts);
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create')->with('categories', $categories);
    }

    public function store(PostStoreRequest $request)
    {
        $input = $request->all();
        $input['creator_id'] = Auth::id();

        $post = Post::create($input);
        return redirect(route('post.index'));
    }

    public function edit($id)
    {
        $categories = Category::all();

        $post = Post::find($id);
        if(empty($post)){
            return redirect(route('post.index'));
        }
        return view('post.edit')->with(['post' => $post, 'categories' => $categories]);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        if(empty($post)){
            return redirect(route('post.index'));
        }
        $post -> fill($request -> all());
        $post -> save();
        return redirect(route('post.index'));
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if(empty($post)){
            return redirect(route('post.index'));
        }
        $post -> delete();
        return redirect(route('post.index'));
    }
}

