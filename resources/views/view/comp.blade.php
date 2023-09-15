@extends('layouts.base')

@section('title', '共通レイアウトの基本')

@section('main')
    <x-my-alert type="success" :alert-title="$title">
        コンポーネントは普通のビューと同じように.blade.phpファイルで定義できます。
    </x-my-alert>
@endsection