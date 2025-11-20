<x-layout title="Edit Recipe">
    <h1>Edit Recipe</h1>

    <a href="{{ route('recipes.show', $recipe) }}">Back</a>

    <x-forms.errors/>
    
    <form method="POST" action="{{ route('recipes.update', $recipe) }}">
        @method("PUT")

        <x-forms.recipe :recipe="$recipe"/>
    </form>
</x-layout>