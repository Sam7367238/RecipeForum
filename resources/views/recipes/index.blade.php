<x-layout title="Recipes">
    <h1>Public Recipes</h1>

    <a href="{{ route('recipes.create') }}">Create Recipe</a>

    <hr>

    @foreach ($recipes as $recipe)
        <div>
            <a href="{{ route('recipes.show', $recipe) }}">{{ $recipe -> title }} - {{ $recipe -> user -> name }}</a>
        </div>
    @endforeach
</x-layout>