@extends('layouts.app')

@section('title', 'Single pokemon page')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                Pokemon: {{ $pokemon->name }}
            </h1>
        </div>
    </div>
    <div class="row pokemons justify-content-center">
        @if (session('updated'))
            <div class="col-12">
                <div class="alert alert-success">
                    {{ session('updated') }} has been updated succesfully
                </div>
            </div>
        @endif

        <article class="card col-6 p-0 m-3">

            <img src="{{ $pokemon->image }}" class="card-img-top w-25" alt="...">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $pokemon->name  }}
                </h5>
                <h6>
                    ID : {{ $pokemon->id }}
                </h6>
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
            <div class="text-center">
                <a class="btn btn-sm btn-success m-3"
                href="{{ route('admin.pokemons.edit', $pokemon->id) }}">
                    Edit
                </a>
                <form action="{{ route('admin.pokemons.destroy', $pokemon->id) }}" class="d-inline form-terminator" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-warning me-2">
                        Delete
                    </button>
                </form>
            </div>
        </article>
    </div>
</div>
@endsection

@section('custom-scripts-tail')
    <script>
        const deleteFormElement = document.querySelector('form.form-terminator');

        deleteFormElement.addEventListener('submit', function(event) {
            event.preventDefault();
            const userConfirm = window.confirm('Are you sure you want to delete this pokemon?');
            if (userConfirm){
                this.submit();
            }
        });
    </script>
@endsection