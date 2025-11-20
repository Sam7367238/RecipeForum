<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Services\RecipeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RecipeController extends Controller
{
    public function __construct(private RecipeService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = $this -> service -> all(Auth::user());

        return view("recipes.index", [
            "recipes" => $recipes["publicRecipes"],
            "privateRecipes" => $recipes["privateRecipes"]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("recipes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecipeRequest $request)
    {
        $recipe = $this -> service -> store(Auth::user(), $request);

        return redirect() -> route("recipes.show", $recipe) -> with("status", "Recipe Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        Gate::authorize("view", $recipe);

        return view("recipes.show", compact("recipe"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        Gate::authorize("owner", $recipe);

        return view("recipes.edit", compact("recipe"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        Gate::authorize("owner", $recipe);

        $this -> service -> update($recipe, $request);

        return redirect() -> route("recipes.show", $recipe) -> with("status", "Recipe Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        Gate::authorize("owner", $recipe);

        $this -> service -> destroy($recipe);

        return redirect() -> route("recipes.index") -> with("status", "Recipe Deleted Successfully");
    }
}
