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

        <form class="col-8" action="{{ route('admin.pokemons.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                {{-- @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror --}}
                <label for="name" class="form-label">
                    Name
                </label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                {{-- @error('type_one')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror --}}
                <label for="type_one" class="form-label">
                    First type
                </label>

                <select class="form-select" id="type_one" name="type_one" required>
                    @foreach ($pokemonTypes as $type )
                        <option value="{{ $type }}" {{ ($type == old('type_one') ? 'selected' : '') }}>{{ ucwords($type) }}</option>
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
                        <option value="{{ $type }}" {{ ($type == old('type_two') ? 'selected' : '') }}>{{ ucwords($type) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="poke_index" class="form-label">
                    Poke index
                </label>
                <input type="number" class="form-control" id="poke_index" name="poke_index"  value="{{ old('poke_index') }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">
                    Image url
                </label>
                <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}" required>
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
