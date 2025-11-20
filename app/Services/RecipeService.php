<?php

namespace App\Services;

use App\Models\Recipe;

class RecipeService {
    public function all($user) {
        $publicRecipes = Recipe::with("user")
        -> where("private", false)
        -> orderBy("created_at", "desc")
        -> paginate(13);

        $privateRecipes = $user -> recipes() -> orderBy("created_at", "desc") -> paginate(13);

        return compact("publicRecipes", "privateRecipes");
    }

    public function store($user, $request) {
        $recipe = $user -> recipes() -> create([
            "title" => $request -> title,
            "recipe" => $request -> recipe,
            "private" => $request -> boolean("private")
        ]);

        return $recipe;
    }

    public function update($recipe, $request) {
        $recipe -> update([
            "title" => $request -> title,
            "recipe" => $request -> recipe,
            "private" => $request -> boolean("private")
        ]);
    }

    public function destroy($recipe) {
        $recipe -> delete();
    }
}