@extends('layouts.app')

@section('content')
  <div class="search-section">
    <form class="" action="{{route('search')}}" method="post">
      {{ csrf_field() }}
      <div class="searchbar-apartments">
        <input id="query" type="text" name="q" value="" autocomplete="off">


        <input id='lat' type="text" name="lat" value="">
        <input id='long' type="text" name="long" value="">
      </div>
      <button type="submit" name="button">Cerca</button>
      <div class="filters-section">
        <div class="filters-number">
          <div class="filters-number-column">

            <label for="bathrooms">Bagni</label>
            {{-- <input id="roomsbath" type="number" name="bathrooms" min="0" value="0"> --}}
            <input id='rangeinputB' type="range" name="bathrooms" value="0" min='0' max='10' oninput="
            bathroomsOutputId.value = rangeinputB.value">
            <output name="bathroomsOutputValue" id="bathroomsOutputId">0</output>
          </div>
          <div class="filters-number-column">

            <label for="distance">Distanza</label>
            <input id='rangeinputD' type="range" name="distance" value="20" min='1' max='100' oninput="distanceOutputId.value = rangeinputD.value">
            <output name="distanceOutputValue" id="distanceOutputId">20</output>
          </div>
          <div class="filters-number-column">

            <label for="rooms">Stanze</label>
            {{-- <input id="roomsbath" type="number" name="rooms" min="0" value="0"> --}}
            <input id='rangeinputR' type="range" name="rooms" value="0" min='0' max='20' oninput="roomsOutputId.value = rangeinputR.value">
            <output name="roomsOutputValue" id="roomsOutputId">0</output>
          </div>

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
  <div class="sponsored-container">
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
                <a href="{{route('show-apartment', $apartment['stats']['apartment_id'])}}">

                  {{$apartment['stats']['title']}}


                  <p class="latitude">{{$apartment['stats']['latitude']}}</p>
                  <p class="longitude">{{$apartment['stats']['longitude']}}</p>

                </a>
                <div class="image-apartment">
                  <img src="" alt="">
                </div>
                <div class="info-apartment">
                  <a href=""></a>
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
