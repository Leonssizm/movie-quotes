<x-layout>
    <x-language/>
    <div class="ml-1 flex justify-center grow">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10 bg-gray-400 p-6 rounded">
                <h1 class="text-center font-bold text-xl">Edit Movie</h1>
                <form>
                    {{-- @method('PUT') --}}
                    @csrf
                    <div class="mb-6 mt-5">
                        <label for="movie" class="block mb-2 uppercase font-bold text-xs">
                            Movie Title
                        </label>
                        <input class="border border-gray-400 p-2 w-full rounded bg-teal-200"
                        type="text"
                        name="movie"
                        id="movie"
                        value="{{$movie->title}}"
                        >
                        @error('movie')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
    
                    <div class="mb-6">
                        <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Update Title
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

                <div class="mb-6 mt-5">
                    <label for="quote" class="block mb-2 uppercase font-bold text-xs">
                        Quotes
                    </label>

                    @foreach($movie->quotes as $key => $quote)
                    <form action="{{route('quote.destroy', ['movie' => $quote->movie_id, 'quote' => $quote->id])}}" method="post">
                            <input id="{{$quote->id}}"
                            class="border border-gray-400 p-2 w-full rounded bg-teal-200" 
                            value="{{$quote->body}}"
                            for='quote'
                            name="quote">
                            <button type="submit" class="text-red-700">Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                     @endforeach
                </div>
            </main>
        </section>
    </div>    

</x-layout>