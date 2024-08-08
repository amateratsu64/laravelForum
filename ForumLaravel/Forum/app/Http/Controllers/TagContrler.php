<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagContrler extends Controller
{
    public function Listll_tag(){
        return view('tag\Listll_tag');
    }
}
