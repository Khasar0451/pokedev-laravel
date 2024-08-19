    <form method="GET" action="/search">
        <input type="text" name="search" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    @foreach ($pokemons as $pokemon)
        <a href="{{ $pokemon['name'] }}">
            <li>{{ $pokemon['name'] }} - <a href="{{ $pokemon['name'] }}/fav">Add to favourites</a> / <a href="{{ $pokemon['name'] }}/unfav">Remove from favourites</a> <br> </li> 
        </a>
    @endforeach
