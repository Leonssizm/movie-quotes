<x-layout>
    <x-language/>
    
    <div class="text-white ml-1">
        {{-- For Testing --}}
    <div class="flex justify-between mb-1">
        <form method="POST" action="{{route('logout')}}">
            @csrf
            <button class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500">Log Out</button>
        </form>
        <a class="bg-green-400 text-white rounded py-2 px-4 hover:bg-green-500"href="{{route('movie.create')}}">Add Movie</a>
        {{--  --}}
    </div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Movie name
                </th>
                <th scope="col" class="px-6 py-3">
                    Quotes
                </th>
                <th scope="col" class="px-6 py-3">
                    Edit
                </th>
                <th scope="col" class="px-6 py-3">
                    Delete
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$movie->title}}
                </th>
                <td class="px-6 py-4">
                @foreach($movie->quotes as $key => $quote)
                    <p class="my-1">{{$key+=1}}.{{$quote->body}}</p>
                @endforeach
                </td>
                <td class="px-6 py-4">
                    {{-- <form method="PUT" action="{{route('movie.edit', $movie->id)}}">
                        <button type="submit" class="text-green-700">Edit</button>
                    </form> --}}
                </td>
                <td class="px-6 py-4">
                    <form action="{{route('movie.destroy', $movie->id)}}" method="post">
                        <button type="submit" class="text-red-700">Delete</button>
                        @method('DELETE')
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layout>
