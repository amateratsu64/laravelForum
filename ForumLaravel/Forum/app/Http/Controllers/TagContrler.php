<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagContrler extends Controller{

    public function Listll_tag(){
        $tags = Tag::all();
        return view('tags.listAllTags', ['tags' => $tags]);
    }
    public function create_tag(Request $request){
        if ($request->method() === 'GET'){
            return view('tag.createtag.createTag');
            } else {
                $request->validate([
                    'title' => 'required|string|max:100',
                    
                ]);
    
                $tag = Tag::create([
                    'title' => $request->title,
                    ]);
    
                return redirect()->intended('/tag')->with('success', 'Tag registrada com sucesso');
            }
    }
    public function List_tag(){
        return view('tag/Editar_tag');
    }
    public function Update_post(Request $request, $id){
        $tag = Tag::where('id', $id)->first();
        $tag->title = $request->title;
        $tag->save();
        $tags = Tag::all();
            return redirect()->route('listAllTags', ['tags' => $tags])->with('message-sucess', 'Tag alterada com sucesso');
    }
    
}
