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

    public function enum_param(Category $category)
    {
        return $category->value;
    } 
}

enum Category: string
{
    case Language = 'lang';
    case Framework = 'fw';
    case Tools = 'tools';
}