@extends('layouts.app')

@section('content')
  <div class="search-section">
    <form class="" action="{{route('search')}}" method="post">
      {{ csrf_field() }}
      <div class="searchbar-section">
        <label for="q">cerca</label>
        <input id="query" type="text" name="q" value="" autocomplete="off">

        <button type="submit" name="button">Cerca</button>

        <input id='lat' type="text" name="lat" value="">
        <input id='long' type="text" name="long" value="">
      </div>
      <div class="filters-section">
        <div class="filters-number">
          <label for="distance">Distanza</label>
          <input type="number" name="distance" value="20">
          <label for="bathrooms">Bagni</label>
          <input type="number" name="bathrooms" min="0" value="0">
          <label for="rooms">Stanze</label>
          <input type="number" name="rooms" min="0" value="0">
        </div>

        <div class="filters-checkbox">
          <label for="services[]"></label>
          @foreach ($services as $service)
          <div class="service">
            <div>{{$service -> name}}</div>
            <input  type="checkbox" name="services[]" value="{{$service -> name}}"> <br>
          </div>
          @endforeach
        </div>

      </div>

    </form>

  </div>
  <div class="sponsored">
    <h1>appartamenti sponsorizzati</h1>
    @foreach ($apartments_pay as $sponsoredApp)

      <div class="sponsored">
        <a href="{{route('show-apartment', $sponsoredApp -> id)}}">{{$sponsoredApp -> title}}</a>
        <p class="latitude">{{$sponsoredApp -> latitude}}</p>
        <p class="longitude">{{$sponsoredApp -> longitude}}</p>
      </div>


    @endforeach
  </div>

  <div class="main_search_bar_query">
    <div class="apartments">
      <div class="results-section">
        @if (@isset($appartamenti))
          <div class="results-apartments">
            @foreach ($appartamenti as $apartment)
              <div class="box-result-apartment">
                <div class="image-apartment">
                  <a href="{{route('show-apartment', $apartment['stats']['apartment_id'])}}">

                    {{$apartment['stats']['title']}}


                    <p class="latitude">{{$apartment['stats']['latitude']}}</p>
                    <p class="longitude">{{$apartment['stats']['longitude']}}</p>

                  </a>
                </div>

              </div>
            @endforeach
          </div>
        @else
          Nessun appartamento presente
        @endif
      </div>
    </div>


      <div class="map" id="map">
      </div>

  </div>


  <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.59.0/maps/maps-web.min.js'></script>
  <script src="{{ asset('js/search.js') }}" defer></script>
@endsection
