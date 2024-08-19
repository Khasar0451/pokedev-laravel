<p>Name: {{ $pokemon['name'] }}</p>
<p>HP: {{ $pokemon['stats'][0]['base_stat'] }}</p>
<p>Attack: {{ $pokemon['stats'][1]['base_stat'] }}</p>
<p>Defence: {{ $pokemon['stats'][2]['base_stat'] }}</p>
<p>Speed: {{ $pokemon['stats'][5]['base_stat'] }}</p>
<img src="{{ $pokemon['sprites']['front_default'] }}" alt="image of {{ $pokemon['name'] }}">