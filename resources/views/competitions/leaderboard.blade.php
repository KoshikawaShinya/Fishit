<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <x-app-layout>
        <x-slot name="header">
            <a href="/competitions/{{$competition->id}}">概要</a>
            <a href="/competitions/{{$competition->id}}/posts">投稿一覧</a>
            <a href='/competitions/{{$competition->id}}/leaderboard'>リーダーボード</a>
            <a href='/competitions/{{$competition->id}}/posts/create'>投稿</a>
        </x-slot>
    <body>
        <h1>Blog Name</h1>
        <div class='posts'>
            @foreach ($posts as $i => $post)
                <div class='post'>
                    <p class='name'>{{$i+1}}. {{ $post->name }}</p>
                    <p class='size'>{{ $post->max_size }}cm</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
    </x-app-layout>
</html>