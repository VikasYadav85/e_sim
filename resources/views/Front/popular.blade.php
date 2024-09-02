<h2 class="section-title-sm text-center mb-0">
    Popular eSIM Destinations
</h2>
<div class="row justify-content-between">
    @forelse ($packageCountries as $packageCountriesss)
        <div class="col-4 col-sm-3 col-md-2 col-xl-auto">
            <a href="{{url('shop-now-id/'.$packageCountriesss->operator_id)}}">
            <div class="country-box">
            <div class="country-flag">
                <img src="{{$packageCountriesss->url}}">
            </div>
            <h3 class="sm-title">{{$packageCountriesss->title}}</h3>
            </div>
            </a>
        </div>
    @empty
    <!-- Code to execute if the collection is empty -->
    <p>No items found.</p>
    @endforelse
</div>