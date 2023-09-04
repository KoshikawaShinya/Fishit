<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='species'>{{ $post->species }}</h2>
                    <p class='size'>{{ $post->size }}cm</p>
                    <p class='place'>{{ $post->place }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>