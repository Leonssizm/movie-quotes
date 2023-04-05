<x-layout>
    <x-language/>

    <div class="ml-1 flex justify-center grow">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10 bg-gray-400 p-6 rounded">
                <h1 class="text-center font-bold text-xl">{{__('table.create_movie')}}</h1>
                <form method="POST" action="{{route('movie.store')}}" >
                   @csrf

                    <div class="mb-6 mt-5">
                        <label for="title_en" class="block mb-2 uppercase font-bold text-xs">
                            {{__('table.movie_title_en')}}
                        </label>
                        <input class="border border-gray-400 p-2 w-full rounded bg-teal-200"
                        type="text"
                        name="title_en"
                        id="title"
                        >
                        @error('title_en')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6 mt-5">
                        <label for="title_ka" class="block mb-2 uppercase font-bold text-xs">
                            {{__('table.movie_title_ka')}}
                        </label>
                        <input class="border border-gray-400 p-2 w-full rounded bg-teal-200"
                        type="text"
                        name="title_ka"
                        id="title"
                        >
                        @error('title_ka')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
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