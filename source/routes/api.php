<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokedexController;

Route::middleware('auth:api')->group(function () {
    Route::get('/pokemon/{pokemonName}', [PokedexController::class, 'getPokemon']);
    Route::get('/pokemon', [PokedexController::class, 'getAllPokemon']);
    Route::get('/api/test', [PokedexController::class, 'test']);
});
