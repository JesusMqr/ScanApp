<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Post;

class ChapterController extends Controller
{
    public function index(Request $request){
        $chapters=Chapter::all();

        return view('chapter.index',compact('chapters'));
    }
    public function show($id){
        $chapter = Chapter::with('images')->find($id);

        return view('chapter.show',compact('chapter'));
    }

    public function create($origin){
        $origin= Post::find($origin);
        
        return view('chapter.create',compact('origin'));
    }

    public function store(Request $request){
        $request->validate(
            [
                'title'=>'required',
                'number'=>'required',
                'post_id'=>'required'
            ]
            );

        $chapter= new Chapter(
            [
                'title'=>$request->title,
                'number'=>$request->number,
                'post_id'=>$request->post_id
            ]
        );
        $chapter->save();

        return redirect()->route('post.show',$chapter->post_id);
        
    }

    public function edit($id){

        $chapter = Chapter::find($id);
        
        return view('chapter.edit',compact('chapter'));
    }

    public function update(Request $request,$id ){
        $request->validate(
            [
                'title'=>'required',
                'number'=>'required',
                'post_id'=>'required'
            ]
            );
            $chapter= Chapter::find($id);
            $chapter->title=$request->title;
            $chapter->number=$request->number;
            $chapter->post_id=$request->post_id;

            $chapter->save();
            
            return redirect()->route('post.show',$chapter->post_id);
    }
    public function destroy($id){
        $chapter = Chapter::find($id);
        $post = $chapter->post_id;
        $chapter->images()->delete();
        $chapter->delete();

        return redirect()->route('post.show',$post);
    }
}
