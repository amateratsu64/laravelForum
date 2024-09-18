<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopcControler extends Controller
{
    public function Listll_topics(){
        return view('topics/Listll_topics');
    }
    public function create_topics(){
        return view('topics/Create_topics');
    }
    public function List_topics(){
        return view('topics/Editar_topics');
    }
}
