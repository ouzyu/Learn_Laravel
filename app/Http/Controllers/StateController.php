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
}
