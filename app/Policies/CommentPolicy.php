<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * Determine whether the user is the owner of the model.
     */
    public function owner(User $user, Comment $comment) {
        return $user -> id === $comment -> user_id;
    }
}