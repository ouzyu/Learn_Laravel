<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function escape()
    {
        return view('view.escape', [
            'msg'=>'<img src="https://wings.msn.to/image/wings.jpg" title="ロゴ" />
            <p>ウィングスへようこそ</p>'
        ]);
    }
}
