<x-layout title="Edit Comment">
    <h1>Edit Comment</h1>

    <a href="{{ route('recipes.comments.index', $recipe) }}">Comments</a>

    <x-forms.errors/>

    <form method="POST" action="{{ route('recipes.comments.update', [$recipe, $comment]) }}">
        @method("PUT")

        <x-forms.comment :comment="$comment"/>
    </form>
</x-layout>