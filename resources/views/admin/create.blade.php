<x-layout>
    <x-language/>

    <div class="ml-1 flex justify-center grow">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10 bg-gray-400 p-6 rounded">
                <h1 class="text-center font-bold text-xl">Create Movie</h1>
                <form method="POST" action="{{route('movie.store')}}" enctype="multipart/form-data">
                   @csrf
                    <div class="mb-6 mt-5">
                        <label for="title" class="block mb-2 uppercase font-bold text-xs">
                            Movie Title
                        </label>
                        <input class="border border-gray-400 p-2 w-full rounded bg-teal-200"
                        type="text"
                        name="title"
                        id="title"
                        >
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6 mt-5">
                        <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs">
                            Thumbnail
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

                    <div class="mb-6 mt-5">
                        <label for="body" class="block mb-2 uppercase font-bold text-xs">
                            Quote
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