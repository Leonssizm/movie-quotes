@props(['movie'])
<div class="grow flex items-center justify-center flex-col">

    <div class="rounded-md">
        @if($movie->thumbnail == null)
        <img width="700" height="386" src="{{ URL::to('/') }}/storage/images/movie-image.jpg" alt="Movie-thumbnail">
        @else
        <img width="700" height="386" src="{{ URL::to('/') }}/storage/images/{{$movie->thumbnail}}" alt="Movie-thumbnail">
        @endif
    </div>
    <div class="mt-16">
        <h1 class="text-xl text-white">{{$movie->quotes->random()->body}}</h1>
    </div>
    <div class="mt-28">
        <a class="text-xl text-white underline" href="{{route('movie', $movie)}}">{{$movie->title}}</a>
    </div>
</div>