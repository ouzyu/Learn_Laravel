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

    public function orderby()
    {
        $result = Book::orderby('price', 'desc')->orderby('published', 'asc')->get();
        return view('hello.list', ['records' => $result]);
    }

    public function offsetLimit()
    {
        $result = Book::orderby('published', 'desc')->offset(2)->limit(3)->get();
        return view('hello.list', ['records' => $result]);
    }

    public function select()
    {
        $result = Book::select('title', 'publisher')->get();
        return view('hello.list', ['records' => $result]);
    }

    public function groupby()
    {
        $result = Book::groupBy('publisher')
        ->selectRaw('publisher, AVG(price) AS price_avg')->get();
        return view('hello.list', ['records' => $result]);
    }

    public function having()
    {
        $result = Book::groupBy('publisher')
        ->having('price_avg', '<', 2500)
        ->selectRaw('publisher, AVG(price) AS price_avg')->get();
        return view('hello.list', ['records' => $result]);
    }

    public function max()
    {
        $result = Book::where('publisher', '走跳社')->max('price');
        // ->avg(), ->count(), ->max(), ->min()
        return view('hello.list', ['records' => $result]);
    }

    public function scope()
    {
        $result = Book::published('走跳社')->get();
        return view('hello.list', ['records' => $result]);
    }
    

    public function dump()
    {
        $result = Book::groupBy('publisher')
        ->having('price_avg', '<', 2500)
        ->selectRaw('publisher, AVG(price) AS price_avg')->dump()->get();
        return view('hello.list', ['records' => $result]);
    }

    public function dd()
    {
        $result = Book::groupBy('publisher')
        ->having('price_avg', '<', 2500)
        ->selectRaw('publisher, AVG(price) AS price_avg')->dd()->get();
        return view('hello.list', ['records' => $result]);
    }

    public function hasmany()
    {
        return view('record.hasmany', [
            'book' => Book::find(1)
        ]);
    }
}
