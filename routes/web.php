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
// Route::resource('admin/pokemons', AdminPokemonController::class);

Route::get('admin/pokemons', [AdminPokemonController::class, 'index'])->name('admin.pokemons.index');