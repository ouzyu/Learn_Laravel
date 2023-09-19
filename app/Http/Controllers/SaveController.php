<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class SaveController extends Controller
{
    public function create()
    {
        return view('save.create');
    }

    public function store(Request $req)
    {
        $b = new Book();
        $b->fill($req->except('_token'))->save();
        return redirect('save/create');
    }
}
