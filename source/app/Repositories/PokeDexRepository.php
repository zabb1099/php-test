<?php

namespace App\Repositories;

use App\Interfaces\PokeDexRepositoryInterface;
use Illuminate\Support\Facades\Http;

class PokeDexRepository implements PokeDexRepositoryInterface
{
    public function getPokemon($pokemonName)
    {
        $apiResponse = Http::get("https://pokeapi.co/api/v2/pokemon{$pokemonName}");

        if($apiResponse->successful()) {
            return $apiResponse->json();
        } else {
            return "Failed to return json response";
        }
    }


    public function getAllPokemon() {
        $apiResponse = Http::get("https://pokeapi.co/api/v2/pokemon");
        if($apiResponse->successful()) {
            return $apiResponse->json();
        } else {
            return "Failed to return json response";
        }
    }

}
