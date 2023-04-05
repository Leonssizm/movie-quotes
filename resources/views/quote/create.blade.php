<x-layout>
    <x-language/>

    <div class="ml-1 flex justify-center grow">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10 bg-gray-400 p-6 rounded">
                <h1 class="text-center font-bold text-xl">{{__('table.create_quote')}}</h1>
                <form method="POST" action="{{route('quote.store')}}" enctype="multipart/form-data">
                   @csrf
                    <div class="mb-6 mt-5">
                        <label for="body_ka" class="block mb-2 uppercase font-bold text-xs">
                            {{__('table.quote_text_ka')}}
                        </label>
                        <input class="border border-gray-400 p-2 w-full rounded bg-teal-200"
                        type="text"
                        name="body_ka"
                        id="body"
                        >
                        @error('body_ka')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6 mt-5">
                        <label for="body_en" class="block mb-2 uppercase font-bold text-xs">
                            {{__('table.quote_text_en')}}
                        </label>
                        <input class="border border-gray-400 p-2 w-full rounded bg-teal-200"
                        type="text"
                        name="body_en"
                        id="body"
                        >
                        @error('body_en')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6 mt-5">
                        <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs">
                            {{__('table.thumbnail')}}
                        </label>
                        <input class="border border-gray-400 p-2 w-full rounded bg-teal-200"
                        type="file"
                        name="thumbnail"
                        id="thumbnail"
                        >
                        @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="movie_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            {{__('table.pick_movie')}}
                        </label>
                        <select name="movie_id" class="w-80 h-10">
                            @foreach($movies as $movie)
                            <option value="{{$movie->id}}">{{$movie->title}}</option>
                            @endforeach
                        </select>

                    </div>
                    
                    <div class="mb-6">
                        <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        >
                        {{__('table.submit')}}
                        </button>    
                    </div>
                    
                </form>
            </main>
        </section>
    </div>   

</x-layout>