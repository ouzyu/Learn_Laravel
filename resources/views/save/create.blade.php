@extends('layouts.base')

@section('title', '書籍情報フォーム')

@section('main')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $err)
                <li class="text-danger">{{ $err }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/save" method="POST">
        @csrf
        <div class="pl-2">
            <label for="isbn" id="isbn">ISBNコード:</label><br>
            <input type="text" id="isbn" name="isbn" size="15" value="{{ old('isbn') }}" class="@error('isbn') bg-danger @enderror"/>
        </div>
        @error('isbn')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="pl-2">
            <label for="title" id="title">書名:</label><br>
            <input type="text" id="title" name="title" size="30" value="{{ old('title') }}" />
        </div>

        <div class="pl-2">
            <label for="price" id="price">価格:</label><br>
            <input type="text" id="price" name="price" size="5" value="{{ old('price') }}" />円
        </div>

        <div class="pl-2">
            <label for="publisher" id="publisher">出版社:</label>
            <input type="text" id="publisher" name="publisher" size="10" value="{{ old('publisher') }}" />
        </div>

        <div class="pl-2">
            <label for="published" id="published">刊行日:</label>
            <input type="text" id="published" name="published" size="10" value="{{ old('published') }}" />
        </div>

        <div class="pl-2">
            <input type="submit" value="送信" />
        </div>
    </form>
@endsection