<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController as GuestPageController;
use App\Http\Controllers\Guest\PokemonController as GuestPokemonController;
use App\Http\Controllers\Admin\PokemonController as AdminPokemonController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GuestPageController::class, 'home'])->name('guest.home');
Route::get('/pokemons', [GuestPokemonController::class, 'index'])->name('guest.pokemons.index');

Route::name('admin.')->prefix('admin')->group( function(){
    Route::get('/pokemons/deleted',            [AdminPokemonController::class, 'trashed'])->name('pokemons.trashed');
    Route::delete('/pokemons/deleted/{id}', [AdminPokemonController::class, 'restore'])->name('pokemons.restore');
    Route::resource('/pokemons', AdminPokemonController::class);
    // Route::get('/pokemons',                 [AdminPokemonController::class, 'index'])->name('pokemons.index');
    // Route::get('/pokemons/create',          [AdminPokemonController::class, 'create'])->name('pokemons.create');
    // Route::post('/pokemons',                [AdminPokemonController::class, 'store'])->name('pokemons.store');
    // Route::get('/pokemons/{id}',            [AdminPokemonController::class, 'show'])->name('pokemons.show');
    // Route::get('/pokemons/{id}/edit',       [AdminPokemonController::class, 'edit'])->name('pokemons.edit');
    // Route::put('/pokemons/{id}',            [AdminPokemonController::class, 'update'])->name('pokemons.update');
    // Route::delete('/pokemons/{id}',         [AdminPokemonController::class, 'destroy'])->name('pokemons.destroy');

    }
);



