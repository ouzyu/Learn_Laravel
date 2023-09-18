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

    public function wherebetween()
    {
        $result = Book::whereBetween('price', [1000, 3000])->get();
        return view('hello.list', ['records' => $result]);
    }

    public function wherenull()
    {
        $result = Book::whereNull('publisher')->get();
        return view('hello.list', ['records' => $result]);
    }

    public function whereyear()
    {
        $result = Book::whereyear('published', '<', '2022')->get();
        return view('hello.list', ['records' => $result]);
    }

    public function whereand()
    {
        $result = Book::where('publisher', '走跳社')->where('price', '<', 3000)->get();
        return view('hello.list', ['records' => $result]);
    }

    public function orwhere()
    {
        $result = Book::where('publisher', '走跳社')->orwhere('price', '<', 2500)->get();
        return view('hello.list', ['records' => $result]);
    }

    public function whereraw()
    {
        $result = Book::whereRaw('publisher = ? AND price < ?', ['走跳社', 3000])->get();
        return view('hello.list', ['records' => $result]);
    }
}
