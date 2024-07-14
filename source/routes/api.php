<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokedexController;

Route::get('/pokemon/{pokemonName}', [PokedexController::class, 'getPokemon']);
Route::get('/pokemon', [PokedexController::class, 'getAllPokemon']);
Route::get('test', [PokedexController::class, 'test']);
