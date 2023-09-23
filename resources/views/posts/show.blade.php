<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h1>詳細</h1>
        </x-slot>
        <body>
            <h1 class="title">
                {{ $post->species }}
            </h1>
            <div class="content">
                <div class="content__post">
                    <h3>本文</h3>
                    <p>{{ $post->size }}cm</p>
                    <p>{{ $post->place }}</p>
                </div>
            </div>
            <div class="edit"><a href="/catches/posts/{{ $post->id }}/edit">edit</a></div>
            <form action="/catches/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
            </form>
            <div class="footer">
                <a href="/catches">戻る</a>
            </div>
            
            <!-- 削除ボタン用 -->
            <script>
                function deletePost(id) {
                    'use strict'
            
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        </body>
    </x-app-layout>
</html>