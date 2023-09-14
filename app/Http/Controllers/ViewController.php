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

    public function comment()
    {
        return view('view.comment');
    }

    public function if()
    {
        return view('view.if',[
            'random'=> random_int(0, 100)
        ]);
    }

    public function unless()
    {
        return view('view.unless',[
            'random' => random_int(0, 100)
        ]);
    }

    public function isset()
    {
        return view('view.isset', [
            'msg' => 'こんにちは、世界!',
        ]);
    }

    public function empty()
    {
        return view('view.empty');
    }

    public function switch()
    {
        return view('view.switch', [
            'random' => random_int(1, 5)
        ]);
    }

    public function while()
    {
        return view('view.while');
    }

    public function for()
    {
        return view('view.for');
    }

    public function foreach()
    {
        return view('view.foreach', [
            'member' => [
                'name' => 'YAMADA, YOSHIHIRO',
                'sex'=> '男',
                'birth' => '1923-11-10',
            ]
        ]);
    }

    public function foreach_loop()
    {
        return view('view.foreach_loop', [
            'weeks' => ['月','火','水','木','金','土','日']
        ]);
    }

    public function style_class()
    {
        return view('view.style_class', [
            'isEnabled' => true
        ]);
    }
}
