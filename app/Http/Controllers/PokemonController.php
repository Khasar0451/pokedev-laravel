<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;
class PokemonController extends Controller
{
    public function showList($pokemons)
    {
        return view('pokemon.list', [
            'pokemons' => $pokemons
        ]);
    }
    
    public function index(){
        $pokemons = Pokemon::simplePaginate(10);
        return $this->showList($pokemons);
    }


    public function show($name){
        $response = Http::get("http://pokeapi.co/api/v2/pokemon/{$name}")->json();
        return view('pokemon.show', ['pokemon'=> $response]);
    }

    public function fav($name){
        setcookie('favourites', $name);
        return redirect('/');
    }
    public function unfav($name) {
        setcookie('favourites', $name, 1);
        return redirect('/');
    }
    
    public function search(){
        $search = request()->input('search');
        $pokemons = Pokemon::where('name','like','%'.$search.'%')->simplePaginate(10);
        return $this->showList($pokemons);
    }
}
