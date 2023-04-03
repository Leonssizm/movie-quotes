@props(['movie', 'quote'])
<div class="grow flex items-center justify-center flex-col">
    <div class="rounded-md">
        @if(gettype($quote) === 'string' || $quote->thumbnail == null)
        <img width="700" height="386" src="{{ URL::to('/') }}/storage/images/movie-image.jpg" alt="thumbnail">
        @else
        <img width="700" height="386" src="{{ URL::to('/') }}/storage/images/{{$quote->thumbnail}}" alt="thumbnail">
        @endif
    </div>
    <div class="mt-16">
        @if(gettype($quote) !== 'string')
        <h1 class="text-xl text-white">{{$quote->body}}</h1>
        @else
        <h1 class="text-xl text-red-400">This Movie Has No Quotes Yet</h1>
        @endif
    </div>
    <div class="mt-28">
        <a class="text-xl text-white underline" href="{{route('movie', $movie)}}">{{$movie->title}}</a>
    </div>
</div>