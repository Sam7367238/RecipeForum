<?php

namespace App\Services;

use App\Models\Recipe;

class RecipeService {
    public function all(bool $private) {
        $recipes = Recipe::with("user")
        -> where("private", $private)
        -> orderBy("created_at", "desc")
        -> paginate(13);

        return $recipes;
    }

    public function store($user, $request) {
        $recipe = $user -> recipes() -> create([
            "title" => $request -> title,
            "recipe" => $request -> recipe,
            "private" => $request -> boolean("private")
        ]);

        return $recipe;
    }
}