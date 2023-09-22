<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>competitions</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h1>詳細</h1>
        </x-slot>
        <body>
            <h1 class="title">
                {{ $competition->species }}
            </h1>
            <div class="content">
                <div class="content__competition">
                    <h3>本文</h3>
                    <p>{{ $competition->description }}</p>
                </div>
            </div>
            <div class="footer">
                <a href="/competitions">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>