<x-layout>
    <x-language/>
    <div class="ml-1 flex justify-center grow">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10 bg-gray-400 p-6 rounded">
                <h1 class="text-center font-bold text-xl">Edit Movie & Quotes</h1>
                <form action="{{route('movie.update', $movie->id)}}" method='post'>
                    @method('PUT')
                    @csrf
                    <div class="mb-6 mt-5">
                        <label for="title" class="block mb-2 uppercase font-bold text-xs">
                            Movie Title
                        </label>
                        <input class="border border-gray-400 p-2 w-full rounded bg-teal-200"
                        type="text"
                        name="title"
                        id="title"
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
                    <div class="flex flex-row-reverse">
                        <form action="{{route('quote.update', ['movie' => $quote->movie_id, 'quote' => $quote->id])}}" method="post" class="flex">
                            <input id="{{$quote->id}}"
                            class="border border-gray-400 p-2 w-full rounded bg-teal-200" 
                            value="{{$quote->body}}"
                            for='body'
                            type="text"
                            name="body">

                            
                            <button type="submit" class="text-green-700">Update</button>
                            @method('PUT')
                            @csrf
                        </form>
                        <form action="{{route('quote.destroy', ['movie' => $quote->movie_id, 'quote' => $quote->id])}}" method="post" class="flex items-end w-1 h-1 mt-7 mr-12">
                            <input id="{{$quote->id}}"
                            class="border border-gray-400 p-2 w-full rounded bg-teal-200" 
                            value="{{$quote->body}}"
                            for='quote'
                            type="hidden"
                            name="quote">
                            <button type="submit" class="text-red-600">Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                     @endforeach
                </div>
            </main>
        </section>
    </div>    

</x-layout>