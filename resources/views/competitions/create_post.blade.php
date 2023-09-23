<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
            <a href="/competitions/{{$competition->id}}">概要</a>
            <a href="/competitions/{{$competition->id}}/posts">投稿一覧</a>
            <a href='/competitions/{{$competition->id}}/leaderboard'>リーダーボード</a>
            
            <button class="bg-purple-400 bg-opacity-100 font-semibold py-2 px-4 rounded" onclick="'/competitions/{{$competition->id}}/posts/create'">投稿</button>
            <!--
            <a href='/competitions/{{$competition->id}}/posts/create'>投稿</a>
            -->
        </x-slot>
        <body>
            <h1>Blog Name</h1>
            <form action="/competitions/{{$competition->id}}/posts/store" method="POST", enctype="multipart/form-data">
                @csrf
                <div class="species">
                    <h2>魚種</h2>
                    <input type="text" name="post[species]" placeholder="魚種" value="{{ old('post.species') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.species') }}</p>
                </div>
                <div class="size">
                    <h2>サイズ</h2>
                    <input type="text" name="post[size]" placeholder="サイズ(cm)" value="{{ old('post.size') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('post.size') }}</p>
                </div>
                <div class="place">
                    <h2>場所</h2>
                    <input type="text" name="post[place]" placeholder="場所" value="{{ old('post.place') }}"//>
                    <p class="title__error" style="color:red">{{ $errors->first('post.place') }}</p>
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