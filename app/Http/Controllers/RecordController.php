<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class RecordController extends Controller
{
    public function find()
    {
        return Book::find(1)->title;
    }

    public function where()
    {
        $result = Book::where('title', 'LIKE', '%Java%')->get();
        return view('hello.list', ['records' => $result]);
    }

    public function wherein()
    {
        $result = Book::whereIn('publisher', ['ジャパンIT', '走跳社', 'IT Emotion'])->get();
        return view('hello.list', ['records' => $result]);
    }
}
