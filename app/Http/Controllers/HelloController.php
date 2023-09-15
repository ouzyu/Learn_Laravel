<?php

namespace App\Http\Controllers;

use App\Models\Hello;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;

use App\Models\Book;

class HelloController extends Controller
{
    public function view()
    {
        $data = ['msg'=>'こんにちは、世界！'];
        return view('hello.view', $data);
    }


    public function index(Request $request) 
    {
        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'required',
        ]);
        if ($validator->fails()) {
            $msg = 'クエリーに問題があります。';
        } else {
            $msg = 'ID/PASSを受け付けました。フォームを入力ください。';
        }
        return view('hello.index', ['msg'=>'フォームを入力ください。']);
    }

    public function post(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',
        ];

        $messages = [
            'name.required' => '名前は必ず入力してください。',
            'mail.email' => 'メールアドレスが必要です。',
            'age.min' => '年齢はゼロ歳以上で記入ください。',
            'age.max' => '年齢は200歳以下で記入ください。',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $validator->sometimes('age', 'min:0', function($input) {
            return !is_int($input->age);
        });

        $validator->sometimes('age', 'max:200', function($input) {
            return !is_int($input->age);
        });

        if ($validator->fails()) {
            return redirect('/hello')->withErrors($validator)->withInput();
        }
        return view('hello.index', ['msg'=>'正しく入力されました！']);
    }

    public function list()
    {
        $data = [
            'records' => Book::all()
        ];
        return view('hello.list', $data);
    }
}