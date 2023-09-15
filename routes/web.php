<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HelloController;
use App\Http\Controllers\ViewController;

use App\Http\Middleware\HelloMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(HelloController::class)->group(function() {
    Route::get('/hello', 'index');
    Route::get('/hello/view', 'view');
    Route::get('/hello/list', 'list');
});

Route::post('/hello', 'HelloController@post');

Route::get('/view/escape', 'ViewController@escape');
Route::get('/view/comment', 'ViewController@comment');
Route::get('/view/if', 'ViewController@if');
Route::get('/view/unless', 'ViewController@unless');
Route::get('/view/isset', 'ViewController@isset');
Route::get('/view/empty', 'ViewController@empty');
Route::get('/view/switch', 'ViewController@switch');
Route::get('/view/while', 'ViewController@while');
Route::get('/view/for', 'ViewController@for');
Route::get('/view/foreach', 'ViewController@foreach');
Route::get('/view/foreach_loop', 'ViewController@foreach_loop');
Route::get('/view/style_class', 'ViewController@style_class');
Route::get('/view/checked', 'ViewController@checked');
Route::get('/view/master', 'ViewController@master');
Route::get('/view/comp', 'ViewController@comp');
Route::get('/view/list', 'ViewController@list');

Route::get('/route/param/{id?}', 'RouteController@param')
    ->where(['id' => '[0-9]{2,3}']);
Route::get('/route/search/{keywd?}', 'RouteController@search')
    ->where('keywd', '.*');

Route::prefix('/members')->group(function() {
    Route::get('/info', 'RouteController@info');
    Route::get('/article', 'RouteController@article');
});

Route::namespace('Main')->group(function() {
    Route::get('/route/ns', 'RouteController@ns');
});

// アクションの省略
Route::view('/route', 'route.view', ['name' => 'Laravel']);

// Enum型によるパラメーターの制限
Route::get('/route/enum_param/{category}', 'RouteController@enum_param');

// リダイレクト先を振り分ける 302 Found
// Route::redirect('/hoge', '/');

// 301 Moved Parmanently
Route::redirect('/hoge', '/', 301);