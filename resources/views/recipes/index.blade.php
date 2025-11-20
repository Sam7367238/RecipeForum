<x-layout title="Recipes">
    <h1>Public Recipes</h1>

    @foreach ($publicRecipes as $recipe)
        <div>
            <a href="{{ route('recipes.show', $recipe) }}">{{ $recipe -> title }} By {{ $recipe -> user -> name }}</a>
        </div>
    @endforeach
</x-layout>