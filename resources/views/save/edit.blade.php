@extends('layouts.base')

@section('title', '書籍情報フォーム（編集）')

@section('main')
    <form action="/save/{{ $b->id }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="pl-2">
            <label for="isbn" id="isbn">ISBNコード:</label><br>
            <input type="text" id="isbn" name="isbn" size="15" value="{{ old('isbn', $b->isbn) }}" />
        </div>

        <div class="pl-2">
            <label for="title" id="title">書名:</label><br>
            <input type="text" id="title" name="title" size="30" value="{{ old('title', $b->title) }}" />
        </div>

        <div class="pl-2">
            <label for="price" id="price">価格:</label><br>
            <input type="text" id="price" name="price" size="5" value="{{ old('price', $b->price) }}" />
        </div>

        <div class="pl-2">
            <label for="publisher" id="publisher">出版社:</label><br>
            <input type="text" id="publisher" name="publisher" size="10" value="{{ old('publisher', $b->publisher) }}" />
        </div>

        <div class="pl-2">
            <label for="published" id="published">刊行日:</label><br>
            <input type="text" id="published" name="published" size="10" value="{{ old('published', $b->published) }}" />
        </div>

        <div class="pl-2">
            <input type="submit" value="送信" />
        </div>
    </form>
@endsection