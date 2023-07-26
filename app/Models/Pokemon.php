<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pokemon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "pokemons";

    protected $fillable = [
        'name', 'type_one', 'type_two', 'poke_index', 'image'
    ];
}
