<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Services\RecipeService;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function __construct(private RecipeService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = $this -> service -> all(false);

        return view("recipes.index", compact("recipes"));
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
        return view("recipes.show", compact("recipe"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
