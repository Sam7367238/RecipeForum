@csrf

<div>
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ old('title', $recipe -> title ?? '') }}">
</div>

<div>
    <label for="recipe">Recipe</label>
    <input type="text" name="recipe" value="{{ old('recipe', $recipe -> recipe ?? '') }}">
</div>

<div>
    <label for="private">Private:</label>
    <input type="checkbox" name="private" @checked(old('private' ?? $recipe -> private ?? ''))>
</div>

<input type="submit" value="Save">