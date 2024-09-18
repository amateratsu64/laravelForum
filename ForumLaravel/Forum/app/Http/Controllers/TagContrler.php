<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagContrler extends Controller{

    public function Listll_tag(){
        return view('tag/Listll_tag');
    }
    public function create_tag(){
        return view('tag/Create_tag');
    }
    public function List_tag(){
        return view('tag/Editar_tag');
    }
    
}
