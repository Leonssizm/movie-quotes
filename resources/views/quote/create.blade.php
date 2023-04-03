<x-layout>
    <x-language/>

    <div class="ml-1 flex justify-center grow">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10 bg-gray-400 p-6 rounded">
                <h1 class="text-center font-bold text-xl">Create Movie</h1>
                <form method="POST" action="{{route('quote.store')}}">
                   @csrf
                    <div class="mb-6 mt-5">
                        <label for="body" class="block mb-2 uppercase font-bold text-xs">
                           Quote Text
                        </label>
                        <input class="border border-gray-400 p-2 w-full rounded bg-teal-200"
                        type="text"
                        name="body"
                        id="body"
                        >
                        @error('body')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="movie_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Pick a Movie
                        </label>
                        <select name="movie_id" class="w-64 h-10">
                            @foreach($movies as $movie)
                            <option value="{{$movie->id}}">{{$movie->title}}</option>
                            @endforeach
                        </select>
        
                        @error('movie_id')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        >
                        Submit
                        </button>    
                    </div>
                    
    
                    @if($errors->any())
    
                    @foreach($errors->all() as $error)
    
                    <ul class="text-red-500 text-xs">
                        <li>{{$error}}</li>
                    </ul>
                    @endforeach
                    @endif
                </form>
            </main>
        </section>
    </div>   

</x-layout>