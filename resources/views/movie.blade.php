<x-layout>
    <x-language/>
    
    <div class="grow flex items-center justify-center flex-col">
        <h1 class="text-3xl text-white">{{$movie->title}}</h1>
        @foreach($movie->quotes as $quote)
        <div class="bg-white mt-5">
            @if($quote->thumbnail == null)
            <img width="700" height="386" src="{{ URL::to('/') }}/storage/images/movie-image.jpg" alt="thumbnail">
            @else
            <img width="700" height="386" src="{{ URL::to('/') }}/storage/images/{{$quote->thumbnail}}" alt="thumbnail">
            @endif
            <h2 class="text-2xl py-10 px-5">{{$quote->body}}</h2>
        </div>
        @endforeach
    <div>
</x-layout>