@extends('layouts.base')

@section('title', '共通レイアウトの基本')

@section('main')
    <x-dynamic-component :component="$comp" type="success" :alert-title="$title">
        コンポーネントは普通のビューと同じように.blade.phpファイルで定義できます!
    </x-dynamic-component>
@endsection