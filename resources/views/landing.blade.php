    <x-layout>
        <x-language/>
        @foreach($movie as $film)
        <x-movie-card :film="$film"/>
        @endforeach
    </x-layout>
