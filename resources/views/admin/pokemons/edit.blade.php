@extends('layouts.app')

@section('title', 'Updating pokemon')


@section('main-content')
<div class="container">
    <div class="row pokemons justify-content-around">
        {{-- <div class="col-12">
            @dump($pokemon->getAttributes())
        </div> --}}
        <div class="col-8">
            <h1>
                Update {{ $pokemon->name }}
            </h1>
        </div>

        <form class="col-8" action="{{ route('admin.pokemons.update', $pokemon->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">
                    Name
                </label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $pokemon->name }}">
            </div>
            <div class="mb-3">
                <label for="type_one" class="form-label">
                    First type
                </label>
                <input type="text" class="form-control" id="type_one" name="type_one" value="{{ $pokemon->type_one }}">
            </div>
            <div class="mb-3">
                <label for="type_two" class="form-label">
                    Second type
                </label>
                <input type="text" class="form-control" id="type_two" name="type_two" value="{{ $pokemon->type_two }}">
            </div>
            <div class="mb-3">
                <label for="poke_index" class="form-label">
                    Poke index
                </label>
                <input type="number" class="form-control" id="poke_index" name="poke_index" value="{{ $pokemon->poke_index }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">
                    Image url
                </label>
                <input type="text" class="form-control" id="image" name="image" value="{{ $pokemon->image }}">

            </div>


            <button type="submit" class="btn btn-success">
                Update pokemon
            </button>
            <button type="reset" class="btn btn-warning">
                Reset fields
            </button>

        </form>
    </div>
</div>

@endsection
