<x-layout title="Recipes">
    <h1>Recipes</h1>

    <a href="{{ route('recipes.create') }}">Create Recipe</a>

    <h2>Your Recipes</h2>

    <hr>

    @foreach ($privateRecipes as $recipe)
        <div>
            <a href="{{ route('recipes.show', $recipe) }}">{{ $recipe -> title }}</a>
        </div>
    @endforeach

    <h2>Public Recipes</h1>

    <hr>

    @foreach ($recipes as $recipe)
        <div>
            <a href="{{ route('recipes.show', $recipe) }}">{{ $recipe -> title }} - {{ $recipe -> user -> name }}</a>
        </div>
    @endforeach

    {{ $recipes -> links() }}
</x-layout>