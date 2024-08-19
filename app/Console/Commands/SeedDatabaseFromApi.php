<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;
use App\Models\Pokemon;

class SeedDatabaseFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pokemon:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get("http://pokeapi.co/api/v2/pokemon?limit=300")->json();
        foreach ($response['results'] as $pokemon) {
            $pokemonDetails = Http::get($pokemon['url'])->json();
            Pokemon::create(
                ['name' => $pokemonDetails['name']],
            );
        }
        $this->info('created');
    }
}
