<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;
class PokemonController extends Controller
{
    
    public function index(){
        // $response = Http::get('http://pokeapi.co/api/v2/pokemon')->json('results');
        $pokemons = Pokemon::simplePaginate(10);
        return view ('pokemon.list', [
            'pokemons' => $pokemons
        ]);
    }

    public function show($name){
        $response = Http::get("http://pokeapi.co/api/v2/pokemon/{$name}")->json();
        return view('pokemon.show', ['pokemon'=> $response]);
    }

    public function fav($name){

    }
    public function unfav($name) {}
    
    public function search(){
        $response = Http::get('http://pokeapi.co/api/v2/pokemon');

        dd(collect($response->json()['results'])->pluck('name')->all());
        $search = request()->input('search');
        $names = collect($response->json()['results'])->pluck('name')->all();
        dd($names);
        $pokemons = collect($names)->where('', 'like', "%$search%")->get(0);
        // dd( $pokemons );
    }
}
