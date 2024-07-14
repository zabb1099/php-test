<?php

namespace App\Interfaces;

interface PokeDexRepositoryInterface
{
    public function getPokemon($pokemonName);
    public function getAllPokemon();
}
