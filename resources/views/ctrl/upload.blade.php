@extends('layouts.base')

@section('title', 'アップロードの基本')

@section('main')
    <form action="/ctrl/uploadfile" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" id="upfile" name="upfile" />
        <input type="submit" value="送信" />
        <p>{{ $result }}</p>
    </form>
@endsection