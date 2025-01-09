
    @isset($tourPackages)
        @if($tourPackages->isEmpty())
            <p>No tour packages found for your search criteria.</p>
        @else
            <div class="places-list">
                @foreach($tourPackages as $package)
                    <div class="place-card">
                        <img src="{{ asset('images/' . $package->image) }}" alt="{{ $package->package_name }}">
                        <h3>{{ $package->package_name }}</h3>
                        <p>{{ $package->description }}</p>
                        <p>Price: ${{ $package->price }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    @else
        <p>No tour packages available.</p>
    @endisset

