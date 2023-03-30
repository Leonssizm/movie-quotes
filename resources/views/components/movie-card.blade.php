@props(['movie'])
<div class="grow flex items-center justify-center flex-col">

    <div class="rounded-md">
        <img width="700" height="386" src="{{ URL::to('/') }}/images/movie-image.jpg" alt="Movie-thumbnail">
    </div>
    <div class="mt-16">
        <h1 class="text-xl text-white">{{$movie->quotes->first()->body}}</h1>
    </div>
    <div class="mt-28">
        <a class="text-xl text-white underline" href="/movie/{{$movie->id}}">{{$movie->title}}</a>
    </div>
</div>