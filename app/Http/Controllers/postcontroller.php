<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postcontroller extends Controller
{
    public function list()
    {
        return view('views/list');
    }
}
