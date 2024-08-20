<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Cookie;
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
    
    public function favouritesIndex(){        
        $names = unserialize($_COOKIE['favourites']);
        $pokemons = Pokemon::whereIn('name', $names)->simplePaginate(10);
        return $this->showList($pokemons);
    }
    
    public function show($name){
        $response = Http::get("http://pokeapi.co/api/v2/pokemon/{$name}")->json();
        return view('pokemon.show', ['pokemon'=> $response]);
    }

    public function addToFavourites($name){

        if (isset($_COOKIE['favourites'])) {
            $pokemons = unserialize($_COOKIE['favourites']);

            if (array_search($name, $pokemons)){
                return redirect('/');
            }

            $pokemons[] = $name;
            setcookie('favourites', serialize($pokemons),0,'/');
        } else {
            $pokemons = array($name);
            setcookie('favourites', serialize($pokemons), 0, '/');
        }
        return redirect('/');
    }

    public function removeFromFavourites($name)
    {
        if (isset($_COOKIE['favourites'])) {
            $pokemons = unserialize($_COOKIE['favourites']);
            unset($pokemons[array_search($name, $pokemons)]);
            setcookie('favourites', serialize($pokemons), 0, '/');
        } 
        return redirect('/');
    }
    
    public function search(){
        $search = request()->input('search');
        $pokemons = Pokemon::where('name','like','%'.$search.'%')->simplePaginate(10);
        return $this->showList($pokemons);
    }
}
