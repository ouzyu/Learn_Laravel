<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function param(int $id)
    {
        return 'id値:' .$id;
    }
}
