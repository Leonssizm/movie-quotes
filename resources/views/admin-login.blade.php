<x-layout>
    <x-language/>
<div class="grow flex items-center justify-center flex-col">
    <form method="POST" action="{{route('admin/login')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="email" class="text-white block mb-2 uppercase font-bold text-xs text-gray-700">
                Email
            </label>
            <input class="border border-gray-400 p-2 w-full rounded"
            type="text"
            name="email"
            id="email"
            value="{{old('email')}}"
            >

            @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mt-10">
            <label for="password" class="text-white block mb-2 uppercase font-bold text-xs text-gray-700">
                password
            </label>
            <textarea class="border border-gray-400 p-2 w-full rounded"
            type="text"
            name="password"
            id="password"
            value="{{old('password')}}"
            ></textarea>

            @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Sign in</button>
    </form>
<div>

</x-layout>