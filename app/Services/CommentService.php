<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Recipe;

class CommentService {
    public function all($recipe) {
        $comments = $recipe 
        -> comments() 
        -> with("user") 
        -> orderBy("created_at", "desc") 
        -> get();

        return $comments;
    }

    public function store($recipe, $request, $user) {
        $recipe -> comments() -> create([
            ...$request -> validated(), 
            "user_id" => $user -> id
        ]);
    }

    public function update($request, $comment) {
        $comment -> update($request -> validated());
    }

    public function destroy($comment) {
        $comment -> delete();
    }
}