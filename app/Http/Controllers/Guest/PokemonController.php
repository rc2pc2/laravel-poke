<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    //

    public function index(){
        $pokemonList = Pokemon::orderBy('poke_index', 'ASC')->get();

        return view('guest.pokemons.index', compact('pokemonList'));
    }
}
