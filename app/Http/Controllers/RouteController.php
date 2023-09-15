<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;

class RouteController extends Controller
{
    public function param(int $id = 1)
    {
        return 'id値:' .$id;
    }

    public function search(string $keywd = 'search')
    {
        return '検索ワード'.$keywd;
    }
}
