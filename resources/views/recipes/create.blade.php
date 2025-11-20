<x-layout title="Create Recipe">
    <x-forms.errors/>
    
    <form method="POST" action="{{ route('recipes.store') }}">
        @method("POST")

        <x-forms.recipe/>
    </form>
</x-layout>