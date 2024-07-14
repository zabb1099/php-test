<?php

namespace App\Repositories;

use App\Interfaces\PokedexRepositoryInterface;
use Illuminate\Support\Facades\Http;

class PokedexRepository implements PokedexRepositoryInterface
{
    public function getAllPokemon($pokemonName)
    {
        $apiResponse = Http::get("https://pokeapi.co/api/v2/pokemon{$pokemonName}");

        if($apiResponse->successful()) {
            return $apiResponse->json();
        } else {
            return "Failed to return json response";
        }
    }

}
