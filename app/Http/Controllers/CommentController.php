<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Recipe;
use App\Services\CommentService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function __construct(private CommentService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Recipe $recipe)
    {
        Gate::authorize("view", $recipe);

        $comments = $this -> service -> all($recipe);

        return view("comments.index", compact("comments", "recipe"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Recipe $recipe)
    {
        Gate::authorize("view", $recipe);

        return view("comments.create", compact("recipe"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Recipe $recipe)
    {
        Gate::authorize("view", $recipe);

        $this -> service -> store($recipe, $request, Auth::user());

        return redirect() -> route("recipes.comments.index", $recipe) -> with("status", "Comment Created Successfully");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe, Comment $comment)
    {
        Gate::authorize("view", $recipe);
        Gate::authorize("owner", $comment);

        return view("comments.edit", compact("comment", "recipe"));        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Recipe $recipe, Comment $comment)
    {
        Gate::authorize("view", $recipe);
        Gate::authorize("owner", $comment);

        $this -> service -> update($request, $comment);

        return redirect() -> route("recipes.comments.index", $recipe) -> with("status", "Comment Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe, Comment $comment)
    {
        Gate::authorize("view", $recipe);
        Gate::authorize("owner", $comment);

        $this -> service -> destroy($comment);

        return redirect() -> route("recipes.comments.index", $recipe) -> with("status", "Comment Deleted Successfully");
    }
}
