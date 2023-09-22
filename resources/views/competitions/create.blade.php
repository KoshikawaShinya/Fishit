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
            <form action="/catches/posts" method="POST", enctype="multipart/form-data">
                @csrf
                <div class="species">
                    <h2>魚種</h2>
                    <input type="text" name="post[species]" placeholder="魚種"/>
                </div>
                <div class="size">
                    <h2>サイズ</h2>
                    <input type="text" name="post[size]" placeholder="サイズ(cm)"/>
                </div>
                <div class="place">
                    <h2>場所</h2>
                    <input type="text" name="post[place]" placeholder="場所"/>
                </div>
                <div class="image">
                    <h2>画像</h2>
                    <input type="file" name="image">
                </div>    
                <input type="submit" value="store"/>
            </form>
            <div class="footer">
                <a href="/catches">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>