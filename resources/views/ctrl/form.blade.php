@extends('layouts.base')

@section('title', 'フォームの基本')

@section('main')
    <form action="/ctrl/result" method="POST">
        @csrf
        <label id="name">名前：</label>
        <input type="text" id="name" name="name" value="" />
        <input type="submit" value="送信" />
        <p>{{ $result }}</p>   
    </form>
@endsection