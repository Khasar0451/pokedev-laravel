<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $response = Http::get('http://pokeapi.co/api/v2/pokemon')->json('results');
        $pokemons = array();
        foreach ($response as $pokemon)
        {
            $pokemons[] = $pokemon['name'];
        }

        return [
            // 'name' => 
        ];
    }
}
