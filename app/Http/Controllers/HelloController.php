<?php

namespace App\Http\Controllers;

use App\Models\Hello;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index() 
    {
        $date = [
            'msg'=>'これはBladeを利用したサンプルです。'
        ];
        return view('hello.index', $date);
    }
}