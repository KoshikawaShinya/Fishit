<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h1>編集画面</h1>
        </x-slot>
        <body>
            <h1 class="title">編集画面</h1>
            <div class="content">
                <form action="/catches/posts/{{$post->id}}" method="POST", enctype="multipart/form-data">
                    <!--
                    @csrf
                    @method('PUT')
                    <div class='content__title'>
                        <h2>タイトル</h2>
                        <input type='text' name='post[title]' value="{{ $post->title }}">
                    </div>
                    <div class='content__body'>
                        <h2>本文</h2>
                        <input type='text' name='post[body]' value="{{ $post->body }}">
                    </div>
                    -->
                    
                    @csrf
                    @method('PUT')
                    <div class="content__species">
                        <h2>魚種</h2>
                        <input type="text" name="post[species]" value="{{ $post->species }}"/>
                    </div>
                    <div class="content__size">
                        <h2>サイズ</h2>
                        <input type="text" name="post[size]" value="{{ $post->size }}"/>
                    </div>
                    <div class="content__place">
                        <h2>場所</h2>
                        <input type="text" name="post[place]" value="{{ $post->place }}"/>
                    </div>
                    <div class="content__image">
                        <h2>画像</h2>
                        <input type="file" name="image">
                    </div>    
                    <input type="submit" value="保存">
                </form>
            </div>
        </body>
    </x-app-layout>
</html>