@props(['quote'])
<div class="grow flex items-center justify-center flex-col">
    <div class="rounded-md">
        @if($quote->thumbnail == null)
        <img width="700" height="386" src="{{ URL::to('/') }}/storage/images/movie-image.jpg" alt="thumbnail">
        @else
        <img width="700" height="386" src="{{ URL::to('/') }}/storage/{{$quote->thumbnail}}" alt="thumbnail">
        @endif
    </div>
    <div class="mt-16">
        <h1 class="text-xl text-white">{{$quote->body}}</h1>
    </div>
    <div class="mt-28">
        <a class="text-xl text-white underline" href="{{route('movie', $quote->movie->id)}}">{{$quote->movie->title}}</a>
    </div>
</div>