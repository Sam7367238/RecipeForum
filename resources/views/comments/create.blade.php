<x-layout title="Create Comment">
    <h1>Create Comment</h1>

    <a href="{{ route('recipes.comments.index', $recipe) }}">Comments</a>

    <x-forms.errors/>

    <form method="POST" action="{{ route('recipes.comments.store', $recipe) }}">
        @method("POST")

        <x-forms.comment/>
    </form>
</x-layout>