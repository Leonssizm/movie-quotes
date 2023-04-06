    <x-layout>
        @php
            dd(app()->version());
        @endphp
        <x-language/>
        <x-movie-card :quote="$quote"/>
    </x-layout>
