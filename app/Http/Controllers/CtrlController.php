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
}
