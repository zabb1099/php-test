<?php

namespace App\Http\Controllers;

use App\Repositories\PokedexRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class PokedexController extends Controller
{
     protected $pokeDexRepository;

    public function __construct(PokedexRepository $pokeDexRepository)
    {
        $this->$pokeDexRepository = $pokeDexRepository;
    }


    public function getPokemon($pokemonName): object
    {
        $pokemonDetails = $this->pokeDexRepository->getPokemon($pokemonName);
        return response()->json($pokemonDetails);
    }


    public function getAllPokemon(): object
    {
        $pokemonDetails = $this->pokeDexRepository->getAllPokemon();
        return response()->json($pokemonDetails);
    }

    public function test()
    {
        return "hello";
    }
}
