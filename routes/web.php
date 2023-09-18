<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HelloController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CtrlController;
use App\Http\Controllers\RecordController;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Middleware\LogMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(HelloController::class)->group(function() {
    Route::get('/hello', 'index');
    Route::get('/hello/view', 'view');
    Route::get('/hello/list', 'list')
    ->name('list');
});

Route::controller(CtrlController::class)->group(function() {
    Route::get('/ctrl/plain', 'plain');
    Route::get('/ctrl/header', 'header');
    Route::get('/ctrl/outJson', 'outJson');
    Route::get('/ctrl/outFile', 'outFile');
    Route::get('/ctrl/outCsv', 'outCsv');
    Route::get('/ctrl/outImage', 'outImage');
    Route::get('/ctrl/redirectBasic', 'redirectBasic');
    Route::get('/ctrl/form', 'form');
    Route::post('/ctrl/result', 'result');
    Route::get('/ctrl/upload', 'upload');
    Route::post('/ctrl/uploadfile', 'uploadfile');
});

Route::group(['middleware' => ['debug']], function() {
    Route::get('/ctrl/middle', 'CtrlController@middle');
});

Route::controller(StateController::class)->group(function() {
    Route::get('/state/recCookie', 'recCookie');
    Route::get('/state/readcookie', 'readcookie');
    Route::get('/state/session', 'session');
    Route::get('/state/session2', 'session2');
});

Route::controller(RecordController::class)->group(function() {
    Route::get('/record/find', 'find');
    Route::get('/record/where', 'where');
    Route::get('/record/wherein', 'wherein');
    Route::get('/record/wherebetween', 'wherebetween');
    Route::get('/record/wherenull', 'wherenull');
    Route::get('/record/whereyear', 'whereyear');
    Route::get('/record/whereand', 'whereand');
    Route::get('/record/orwhere', 'orwhere');
    Route::get('/record/whereraw', 'whereraw');
    Route::get('/record/orderby', 'orderby');
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
    ->where(['id' => '[0-9]{2,3}'])
    ->name('param');
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

// Resourceルート
Route::resource('articles', 'ArticleController');

// フォールバックルート
Route::fallback(function() {
    return view('route.error');
});

