@extends('layouts.app')

@section('title', 'Pokemons list')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                Pokemon list
            </h1>
        </div>
    </div>
    <div class="row pokemons justify-content-around">
        @foreach ($pokemonList as $pokemon)
            <article class="card col-3 p-0 m-3">
                <img src="{{ $pokemon->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $pokemon->name  }}
                    </h5>
                    <p class="card-text">
                        This pokemon has poke index: {{ $pokemon->poke_index }}
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        {{ $pokemon->type_one  }}
                    </li>
                    <li class="list-group-item">
                        {{ $pokemon->type_two  }}
                    </li>
                </ul>
            </article>
        @endforeach
    </div>
</div>

@endsection
