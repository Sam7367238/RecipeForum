<x-layout title="Create Recipe">
    <h1>Create Recipe</h1>
    
    <x-forms.errors/>

    <form method="POST" action="{{ route('recipes.store') }}">
        @method("POST")

        <x-forms.recipe/>
    </form>
</x-layout>