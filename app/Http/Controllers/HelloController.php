<?php

namespace App\Http\Controllers;

use App\Models\Hello;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index($id = 'zero') 
    {
        $date = [
            'msg'=>'これはコントローラから渡されたメッセージです。',
            'id'=>$id
        ];
        return view('hello.index', $date);
    }
}