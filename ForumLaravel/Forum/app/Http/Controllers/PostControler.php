<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostControler extends Controller
{
    
    public function Listll_post(){
        return view('post\Listll_post');
    }
    //

    public function create_post(){
        return view('post\Create_post');
    }
    public function List_post(){
        return view('post\Editar_post');
    }
}

