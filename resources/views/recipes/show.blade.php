<x-layout title="Recipe">
    <h1>{{ $recipe -> title }}</h1>

    <pre>{{ $recipe -> recipe }}</pre>

    <hr>

    @can("owner", $recipe)
        <a href="{{ route('recipes.edit', $recipe) }}">Edit</a>

        <form method="POST" action="{{ route('recipes.destroy', $recipe) }}">
            @method("DELETE")
            @csrf
            
            <input type="submit" value="Delete">
        </form>
    @endcan

    <a href="{{ route('recipes.comments.index', $recipe) }}">Comments</a>

    <p>Created At: {{ $recipe -> created_at -> diffForHumans() }}</p>
    <p>Author: {{ $recipe -> user -> name }}</p>
</x-layout>