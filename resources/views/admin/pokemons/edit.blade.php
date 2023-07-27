@extends('layouts.app')

@section('title', 'Updating pokemon')


@section('main-content')
<div class="container">
    <div class="row pokemons justify-content-center">
        {{-- <div class="col-12">
            @dump($pokemon->getAttributes())
        </div> --}}
        <div class="col-8">
            <h1>
                Update {{ $pokemon->name }}
            </h1>
        </div>

        <div class="col-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>


        <form class="col-8" action="{{ route('admin.pokemons.update', $pokemon->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">
                    Name
                </label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pokemon->name) }}">
            </div>
            <div class="mb-3">
                <label for="type_one" class="form-label">
                    First type
                </label>

                <select class="form-select" id="type_one" name="type_one"  required>
                    @foreach ($pokemonTypes as $type )
                        <option value="{{ $type }}" {{($type == old('type_one', $pokemon->type_one)) ? 'selected' : '' }}>{{ ucwords($type) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="type_two" class="form-label">
                    Second type
                </label>

                <select class="form-select" id="type_two" name="type_two">
                    <option value=""></option>
                    @foreach ($pokemonTypes as $type )
                        <option value="{{ $type }}" {{old('type_one', $pokemon->type_two) ? 'selected' : '' }}>{{ ucwords($type) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="poke_index" class="form-label">
                    Poke index
                </label>
                <input type="number" class="form-control" id="poke_index" name="poke_index"  value="{{ old('poke_index', $pokemon->poke_index) }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">
                    Image url
                </label>
                <input type="text" class="form-control" id="image" name="image"  value="{{ old('image', $pokemon->image) }}">

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
