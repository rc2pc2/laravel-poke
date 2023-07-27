<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemonList = Pokemon::paginate(8);
        return view('admin.pokemons.index', compact('pokemonList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pokemonTypes = ['pshychic', 'flight', 'water', 'fire', 'grass', 'ice', 'ground', 'rock', 'dragon', 'fairy', 'ghost', 'dark', 'steel', 'fighting', 'normal', 'electric', 'poison', 'bug'];

        return view('admin.pokemons.create', compact("pokemonTypes"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pokemonTypes = ['pshychic', 'flight', 'water', 'fire', 'grass', 'ice', 'ground', 'rock', 'dragon', 'fairy', 'ghost', 'dark', 'steel', 'fighting', 'normal', 'electric', 'poison', 'bug'];

        $request['pokemonTypes'] = $pokemonTypes;

        $data = $request->validate([
            'name' => 'required|unique:pokemons|max:255|min:3',
            'type_one' => 'required|in_array:pokemonTypes.*',
            'type_two' => 'in_array:pokemonTypes.*|different:type_one',
            'poke_index' => 'required|integer|gt:0|unique:pokemons',
            'image' => 'required|url|string'
        ],
        [
            'name.required' => 'You cannot create a pokemon without a name'  ]
        );

        $newPokemon = new Pokemon();

        $newPokemon->fill($data);
        $newPokemon->save();
        return redirect()->route('admin.pokemons.index')->with('created', $newPokemon->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Int $id)
    {
        $pokemon = Pokemon::findOrFail($id);
        return view('admin.pokemons.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Int $id)
    {
        $pokemonTypes = ['pshychic', 'flight', 'water', 'fire', 'grass', 'ice', 'ground', 'rock', 'dragon', 'fairy', 'ghost', 'dark', 'steel', 'fighting', 'normal', 'electric', 'poison', 'bug'];

        $pokemon = Pokemon::findOrFail($id);
        return view('admin.pokemons.edit', compact('pokemon', "pokemonTypes"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Int $id)
    {
        $pokemonTypes = ['pshychic', 'flight', 'water', 'fire', 'grass', 'ice', 'ground', 'rock', 'dragon', 'fairy', 'ghost', 'dark', 'steel', 'fighting', 'normal', 'electric', 'poison', 'bug'];

        $request['pokemonTypes'] = $pokemonTypes;

        $data = $request->validate([
            'name' => ["required", "min:3", "max:255", Rule::unique('pokemons')->ignore($id)],
            'type_one' => 'required|in_array:pokemonTypes.*',
            'type_two' => 'in_array:pokemonTypes.*|different:type_one',
            'poke_index' => ['required', 'integer', 'gt:0', Rule::unique('pokemons')->ignore($id)] ,
            'image' => 'required|url|string'
        ]);

        $pokemon = Pokemon::findOrFail($id);

        // $pokemon->name = $data["name"];
        // $pokemon->type_one = $data['type_one'];
        // $pokemon->type_two = $data['type_two'];
        // $pokemon->poke_index = $data['poke_index'];
        // $pokemon->image = $data['image'];
        // $pokemon->save();

        $pokemon->update($data);

        return redirect()->route('admin.pokemons.show', $pokemon->id)->with('updated', $pokemon->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Int $id)
    {
        $pokemon = Pokemon::findOrFail($id);

        $pokemon->delete();

        return redirect()->route('admin.pokemons.index')->with('delete', $pokemon->name);
    }


    public function trashed(){
        $pokemonList = Pokemon::onlyTrashed()->paginate(10);
        return view('admin.pokemons.trashed', compact('pokemonList'));
    }


    public function restore(Int $id){
        $pokemon = Pokemon::withTrashed()->findOrFail($id);
        $pokemon->restore();
        return redirect()->route('admin.pokemons.index')->with('restored', $pokemon->name);
    }
}
