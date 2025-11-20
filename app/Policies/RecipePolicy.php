<?php

namespace App\Policies;

use App\Models\Recipe;
use App\Models\User;

class RecipePolicy
{

    /**
     * Determine whether the user is the owner of the model.
     */
    public function owner(User $user, Recipe $recipe) {
        return $user -> id === $recipe -> user_id;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Recipe $recipe): bool
    {
        $owner = $user -> id === $recipe -> user_id;
        $private = $recipe -> private;

        return $owner || !$private;
    }
}
