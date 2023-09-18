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
}
