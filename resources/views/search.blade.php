@if($places->isEmpty())
    <p>No places found in this category.</p>
@else
    <div class="places-list">
        @foreach($places as $place)
            <div class="place-card">
                <img src="{{ asset('images/' . $place->image) }}" alt="{{ $place->name }}">
                <h3>{{ $place->name }}</h3>
                <p>{{ $place->description }}</p>
                <p>Price: ${{ $place->price }}</p>
                <p>Rating: {{ $place->rating }}/5</p>
            </div>
        @endforeach
    </div>
  {{-- hello --}}
  {{-- test --}}
  {{-- test --}}
  {{-- test --}}
  {{-- yes --}}
  {{-- test --}}
@endif
