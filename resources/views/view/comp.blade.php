@extends('layouts.base')

@section('title', '共通レイアウトの基本')

@section('main')
    @include('components.my-alert', [
        'type' => 'success',
        'alertTitle' => 'はじめてのコンポーネント',
        'slot' => 'コンポーネントは普通のビューと同じように.blade.phpファイルで定義できます!'
    ])
@endsection