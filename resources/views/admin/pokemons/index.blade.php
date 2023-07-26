@extends('layouts.app')

@section('title', 'Admin Pokemons Index')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="m-4">
                Admin Pokemon Index Panel
            </h1>
        </div>
    </div>
    <div class="row">
        @if (session('delete'))
            <div class="col-12">
                <div class="alert alert-warning">
                    {{ session('delete') }} has been deleted succesfully
                </div>
            </div>
        @elseif ( session('created'))
            <div class="col-12">
                <div class="alert alert-primary">
                    {{ session('created') }} has been created succesfully
                </div>
            </div>
        @endif
        <div class="col-12">
            <table class="table table-striped table-hover text-center table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">First type</th>
                        <th scope="col">Second type</th>
                        <th scope="col">Poke index</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pokemonList as $pokemon)
                        <tr>
                            <th scope="row">
                                {{ $pokemon->id }}
                            </th>
                            <td>
                                {{ $pokemon->name  }}
                            </td>
                            <td>
                                {{ $pokemon->type_one  }}
                            </td>
                            <td>
                                {{ $pokemon->type_two  }}
                            </td>
                            <td>
                                {{ $pokemon->poke_index  }}
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary me-2"
                                    href="{{ route('admin.pokemons.show', $pokemon->id) }}">
                                    View
                                </a>
                                <a class="btn btn-sm btn-success me-2"
                                    href="{{ route('admin.pokemons.edit', $pokemon->id) }}">
                                    Edit
                                </a>
                                <form action="{{ route('admin.pokemons.destroy', $pokemon->id) }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-warning me-2">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {!! $pokemonList->links() !!}

</div>



@endsection
