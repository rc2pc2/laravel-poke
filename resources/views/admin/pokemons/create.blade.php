@extends('layouts.app')

@section('title', 'Create pokemon page')

@section('main-content')
<div class="container">
    <div class="row pokemons justify-content-around">
        <div class="col-8">
            <h1>
                Create a new pokemon
            </h1>
        </div>

        <form class="col-8" action="{{ route('admin.pokemons.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">
                    Name
                </label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="type_one" class="form-label">
                    First type
                </label>
                <input type="text" class="form-control" id="type_one" name="type_one">
            </div>
            <div class="mb-3">
                <label for="type_two" class="form-label">
                    Second type
                </label>
                <input type="text" class="form-control" id="type_two" name="type_two">
            </div>
            <div class="mb-3">
                <label for="poke_index" class="form-label">
                    Poke index
                </label>
                <input type="number" class="form-control" id="poke_index" name="poke_index">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">
                    Image url
                </label>
                <input type="text" class="form-control" id="image" name="image">
            </div>


            <button type="submit" class="btn btn-primary">
                Create new pokemon
            </button>
            <button type="reset" class="btn btn-warning">
                Reset fields
            </button>

        </form>
    </div>
</div>

@endsection
