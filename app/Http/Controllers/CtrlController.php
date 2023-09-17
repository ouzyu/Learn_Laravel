<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CtrlController extends Controller
{
    public function plain()
    {
        return response('こんにちは、世界!', 200)
        ->header('Content-Type', 'text/plain');
    }

    public function header()
    {
        return response()
        ->view('ctrl.header', ['msg' => 'こんにちは、世界!'], 200)
        ->header('Content-Type', 'text/xml');
    }

    public function outJson()
    {
        return response()
        ->json([
            'name' => 'Yoshihiro, YAMADA',
            'sex' => 'male',
            'age' => 18,
        ])
        ->withCallback('callback');
    }

    public function outFile()
    {
        return response()
        ->download('C:/data/data_log.csv', 'download.csv',
        ['content-type' => 'text/csv']);
    }

    public function outCsv()
    {
        return response()
        ->streamDownload(function() {
            print(
                "1,2022/10/1,123\n".
                "2,2022/10/2,116\n".
                "3,2022/10/3,98\n".
                "4,2022/10/4,102\n".
                "5,2022/10/5,134\n"
            );
        }, 'download.csv', ['content-type' => 'text/csv']);
    }

    public function outImage()
    {
        return response()
        ->file('C:/data/wings.png', ['content->type' => 'image/png']);
    }

    public function redirectBasic()
    {
        return redirect()->away('https://wings.msn.to/');
    }

    public function index(Request $req)
    {
        return 'リクエストパス:'.$req->path();
    }

    public function form()
    {
        return view('ctrl.form', ['result'=>'']);
    }

    public function result(Request $req)
    {
        $name = $req->name;
        return view('ctrl.form', [
            'result' => 'こんにちは、'.$name.'さん!'
        ]);
    }

    public function upload()
    {
        return view('ctrl.upload', ['result' => '']);
    }

    public function uploadfile(Request $req)
    {
        if (!$req->hasFile('upfile')) {
            return 'ファイルを指定してください。';
        }
        
        $file = $req->upfile;
        if (!$file->isValid()) {
            return 'アップロードに失敗しました。';
        }

        $name = $file->getClientOriginalName();
        $file->storeAs('files', '$name');
        return view('ctrl.upload', [
            'result' => $name.'をアップロードしました。'
        ]);
    }

    public function middle()
    {
        return 'log is recorded!!';
    }
}
