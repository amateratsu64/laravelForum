<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopcControler extends Controller
{
    public function Listll_topics(){
        $topics = Topic::all(); 
        return view('topics/Listll_topics',['topics' => $topics]);
    }
    public function create_topics(Request $request){
        if ($request->isMethod('GET')) {
            return view('topics/Create_topics');
        } else {
             $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|',
                'status' => 'required|string|',
             ]);
    
            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
            ]);
    
            return redirect()->route('topics/Listll_topics')
            ->with('success', 'Tópico cadastrado com sucesso.');
        }
    }
    public function List_topics(Request $request, $id){
        $topic = Topic::where('id', $id)->first();
        $topic->title = $request->title;
        $topic->description = $request->description;
        $topic->status = $request->status;
        $topic->save();
        return redirect()->route('listTopicById', [$topic->id])->with('message-sucess', 'Alteração realizada com sucesso');
    }
    public function deleteTopic(Request $request, $id){
    $topic = Topic::where('id', $id)->delete();
    return redirect()->route('topics.view_topic');
}
    
}