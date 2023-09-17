<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CtrlController extends Controller
{
    public function plain()
    {
        return response('こんにちは、世界!', 200)
        ->header('Content-Type', 'text/plain');
    }

    public function header()
    {
        return response()
        ->view('ctrl.header', ['msg' => 'こんにちは、世界!'], 200)
        ->header('Content-Type', 'text/xml');
    }

    public function outJson()
    {
        return response()
        ->json([
            'name' => 'Yoshihiro, YAMADA',
            'sex' => 'male',
            'age' => 18,
        ]);
    }
}
