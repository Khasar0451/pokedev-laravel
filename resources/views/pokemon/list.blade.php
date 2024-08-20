    <form method="GET" action="/search">
        <input type="text" name="search" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <h2><a href="favouritesIndex">These are your ✨favourite✨ pokémon</a></h2>

    @foreach ($pokemons as $pokemon)
        <a href="{{ $pokemon['name'] }}">
            <li>{{ $pokemon['name'] }} - <a href="{{ $pokemon['name'] }}/addtofavourites">Add to favourites</a> / <a href="{{ $pokemon['name'] }}/removefromfavourites">Remove from favourites</a> <br> </li> 
        </a>
    @endforeach
    {{ $pokemons->links() }}
