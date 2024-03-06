<?php

namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        $images=Image::all();

        return view('image.index', compact('images'));
    }
    
    public function create($origin){
        $origin=Chapter::find($origin);

        return view('image.create', compact('origin'));
    }

    public function store(Request $request){

        $request->validate([
            'chapter_id' => 'required',
            'url' => 'required',
            'number' => 'required',
        ]);

        $image = new Image([
            'chapter_id' => $request->chapter_id,
            'url' => $request->url,
            'number' => $request->number,
        ]);

        $image->save();

        return redirect()->route('chapter.show',$image->chapter_id);
    }
    public function destroy($id){
        $image=Image::find($id);
        $chapter=$image->chapter_id;
        $image->delete();
        return redirect()->route('chapter.show',$chapter);
     }
}
