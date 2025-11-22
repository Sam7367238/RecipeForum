<x-layout title="Comments">
    <h1>Comments</h1>

    <a href="{{ route('recipes.show', $recipe) }}">Back</a>

    <a href="{{ route('recipes.comments.create', $recipe) }}">Create Comment</a>

    @foreach ($comments as $comment)
        <div>
            <div>
                <p>{{ $comment -> created_at -> diffForHumans() }}</p>
                <p><b>{{ $comment -> user -> name }}</b></p>
            </div>
                
            <p>{{ $comment -> comment }}</p>

            @can("owner", $comment)
                <a href="{{ route('recipes.comments.edit', [$recipe, $comment]) }}">Edit</a>

                <form method="POST" action="{{ route('recipes.comments.destroy', [$recipe, $comment]) }}">
                    @method("DELETE")
                    @csrf
                    
                    <input type="submit" value="Delete">
                </form>
            @endcan
        </div>
    @endforeach
</x-layout>