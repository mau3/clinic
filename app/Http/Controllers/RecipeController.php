<?php

namespace App\Http\Controllers;
use App\Reception;
use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Requests;



class RecipeController extends Controller
{
    public function index()
    {

        return view('home.index');

    }

    public function create($id)
    {
        $rec= Reception::findOrFail($id);
        $recipe = Recipe::get();

        return view('recipe.addRecipe', compact('recipe','rec'));

    }

    public function showall($id)
    {
        $rec= Reception::findOrFail($id);

        $recipe = Recipe::where('reception_id',$id)->get();

        return view('recipe.showAll', compact('recipe','rec'));
dd($recipe);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'content' => 'required',
        ]);


        $recipe = Recipe::create([
            'content' => $request->get('content'),
            'reception_id' => $request->get('reception_id')

        ]);

        return redirect('/receptions/index');
    }  //


}
