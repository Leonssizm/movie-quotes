<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Movie Quotes</title>
    </head>
    <body class="bg-[radial-gradient(50%_50%_at_50%_50%,#4E4E4E_0%,#3D3B3B_99.99%,#3D3B3B_100%)] h-screen">
        <div class="h-full flex items-center flex-grow">
            {{$slot}}
        </div>
    </body>
</html>