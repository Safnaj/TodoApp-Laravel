<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function open()
    {
        //echo "Welcome to LARAVEL..!";
        return view('new');
    }
}
