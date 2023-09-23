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
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='species'>
                        <a href="/catches/posts/{{ $post->id }}">{{ $post->species }}</a>
                    </h2>
                    <p class='size'>{{ $post->size }}cm</p>
                    <p class='place'>{{ $post->place }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
    </x-app-layout>
</html>