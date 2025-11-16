<x-layout title="Home">
    <h1>Ayman's Starter Kit For Laravel 12</h1>

    @guest
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('login') }}">Login</a>
    @endguest

    @auth
        
    @endauth
</x-layout>