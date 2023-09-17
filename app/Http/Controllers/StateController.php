<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function recCookie()
    {
        return response()
        ->view('state.view')
        ->cookie('app_title', 'laravel', 60 * 24 * 30);
    }

    public function readCookie(Request $req)
    {
        return view('state.readcookie', [
            'app_title' => $req->cookie('app_title')
        ]);
    }
}
