<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index() {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    public function show($id) {
        $post = Post::findorfail($id);
        return view('posts.show',compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request){
        Post::create([
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'weight' => $request->get('weight'),
            'post_text' => $request->get('post_text'),
        ]);
        return redirect()->back();
    }

    public function edit($id){
        $post = Post::findorfail($id);
        return view('posts.update',compact('post'));
    }

    public function update ($id, Request $request) {
        $post = Post::findorfail($id);
        $post->update($request->all());

        return redirect()->back();
    }

    public function delete($id) {
        $post = Post::findorfail($id);
        $post->delete();
        return redirect()->back();
    }



}