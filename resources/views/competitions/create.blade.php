<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h1>投稿</h1>
        </x-slot>
        <body>
            <h1>Blog Name</h1>
             <form action="/competitions/store" method="POST", enctype="multipart/form-data">
                @csrf
                <div class="species">
                    <h2>魚種</h2>
                    <input type="text" name="competition[species]" placeholder="魚種" value="{{ old('post.species') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.species') }}</p>
                </div>
                <div class="description">
                    <h2>詳細</h2>
                    <input type="text" name="competition[description]" placeholder="詳細" value="{{ old('post.description') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.description') }}</p>
                </div>
                <div class="image">
                    <h2>画像</h2>
                    <input type="file" name="image">
                </div>    
                <input type="submit" value="store"/>
            </form>
            <div class="footer">
                <a href="/competitions">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>