<x-layout title="Home">
    <h1>Recipe Forum</h1>
    <p>Share your delicious recipes.</p>

    @guest
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('login') }}">Login</a>
    @endguest

    @auth
        <a href="{{ route('recipes.index') }}">Recipes</a>
    @endauth
</x-layout>