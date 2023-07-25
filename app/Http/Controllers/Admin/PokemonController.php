<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemonList = Pokemon::paginate(10);
        return view('admin.pokemons.index', compact('pokemonList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pokemons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ? prendo i valori
        $data = $request->all();
        // dd($data);

        // ? li inserisco nel db
        // # creo un'istanza del nuovo modello
        $newPokemon = new Pokemon();

        // # popolo il nuovo modello
        // $newPokemon->name = $data['name'];
        // $newPokemon->type_one = $data['type_one'];
        // $newPokemon->type_two = $data['type_two'];
        // $newPokemon->poke_index = $data['poke_index'];
        // $newPokemon->image = $data['image'];
        $newPokemon->fill($data);

        // # lo salvo nel db
        $newPokemon->save();

        // ? reindirizziamo l'utente in un'altra pagina
        return redirect()->route('admin.pokemons.show', $newPokemon->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
