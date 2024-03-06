<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){
        $posts = Post::all();

        $search = $request->input('search');
        
        if ($search) {
            $posts = Post::where('title', 'like', '%' . $search . '%')->get();
        } else {
            $posts = Post::all();
        }
    
        return view('post.index', compact('posts'));
    }
    public function show($id){
        $post = Post::with('chapters')->find($id);



        return view('post.show', compact('post'));
    }
    public function create(){

        return view('post.create');
    }
    public function store(Request $request){
        $request->validate([
            'title' =>'required',
            'description' =>'required',
            'imageUrl' =>'required',
        ]);

        $post = new Post([
            'title' => $request->title,
            'description' => $request->description,
            'imageUrl' => $request->imageUrl,
        ]);

        $post->save();

        return redirect()->route('post.index');
    }
    public function edit($id){
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'title' =>'required',
            'description' =>'required',
            'imageUrl' =>'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->imageUrl = $request->imageUrl;

        $post->save();

        return redirect()->route('post.index');
    }
    public function destroy($id){
        $post = Post::find($id);
        $post->chapters()->each(function ($chapter) {
            $chapter->images()->delete();
        });
    
        // Eliminar los capítulos
        $post->chapters()->delete();
    
        // Eliminar el post
        $post->delete();
        return redirect()->route('post.index');
    }
}
