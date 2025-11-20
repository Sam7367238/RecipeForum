<x-layout title="Recipe">
    <h1>{{ $recipe -> title }}</h1>

    <pre>{{ $recipe -> recipe }}</pre>

    <hr>

    <p>Created At: {{ $recipe -> created_at -> diffForHumans() }}</p>
    <p>Author: {{ $recipe -> user -> name }}</p>
</x-layout>