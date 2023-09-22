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
            index
        </x-slot>
    <body>
        <h1>Blog Name</h1>
        <div class='competitions'>
            <a href='/competitions/create'>create</a>
            @foreach ($competitions as $competition)
                <div class='competition'>
                    <h2 class='species'>
                        <a href="/competitions/{{ $competition->id }}">{{ $competition->species }}</a>
                    </h2>
                    <p class='size'>{{ $competition->description }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $competitions->links() }}
        </div>
    </body>
    </x-app-layout>
</html>