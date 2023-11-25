@extends('components.layout')

@section('content')

<main class="max-w-lg mx-auto mt-10b bg-gray-100">
 <x-panel>
    <h1 class="text-center font-bold text-xl">Log in!</h1>
    <form method="POST" action="/sessions" class="mt-16">
        @csrf

        <x-form.input name="email"  type="email" autocomplete="username"/>
        <x-form.input name="password"  type="password" autocomplete="current-password"/>
        <x-form.button>Log In</x-form.button>

    </form>
 </x-panel>
</main>

@endsection