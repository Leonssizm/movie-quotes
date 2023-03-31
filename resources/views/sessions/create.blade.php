<x-layout>
    <x-language/>
    <div class="ml-1 flex justify-center grow">
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 p-6 rounded">
            <h1 class="text-center font-bold text-xl text-white">Log In</h1>
            <form method="POST" action="{{route('login.store')}}">
                @csrf
                <div class="mb-6 mt-5">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-white">
                        Email
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded bg-teal-200"
                    type="email"
                    name="email"
                    id="userEmail"
                    value="{{old('email')}}"
                    >

                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-white">
                        Password
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded bg-teal-200"
                    type="password"
                    name="password"
                    id="password"
                    >

                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                    Log In
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