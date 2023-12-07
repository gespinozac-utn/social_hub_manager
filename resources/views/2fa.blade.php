@extends('components.layout')

@section('content')

<main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
    <h1 class="text-center font-bold text-xl">2FA!</h1>
    <form method="POST" action="{{route('2fa.post')}}" class="mt-16">
        @csrf

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="code"
            >
                Code
            </label>
            <input class="border border-gray-400 p-2 w-full"
                type="text"
                inputmode="numeric" 
                name="code" 
                id="code"
                required
            >
            @error('code')
                <p class="text-red-500 text-xs  mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
            >
                Submit
            </button>
        </div>
    </form>
</main>

@endsection