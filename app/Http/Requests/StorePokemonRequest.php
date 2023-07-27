<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePokemonRequest extends FormRequest
{

    private $pokemonTypes = ['pshychic', 'flight', 'water', 'fire', 'grass', 'ice', 'ground', 'rock', 'dragon', 'fairy', 'ghost', 'dark', 'steel', 'fighting', 'normal', 'electric', 'poison', 'bug'];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ["required", "min:3", "max:255", Rule::unique('pokemons')],
            'type_one' => 'required|in:' . implode(',', $this->pokemonTypes),
            'type_two' => 'different:type_one|in:' . implode(',', $this->pokemonTypes),
            'poke_index' => ['required', 'integer', 'gt:0','lt:65535', Rule::unique('pokemons')] ,
            'image' => 'required|url|string',
        ];
    }
}
