@extends('layouts.app')

@section('content')
  <div class="search-section">
    <form class="" action="{{route('search')}}" method="post">
      {{ csrf_field() }}
      <div class="searchbar-apartments">

        <input id="query" type="text" name="q" value="{{old('q', $request -> q)}}" autocomplete="off">


        <input id='lat' type="text" name="lat" value="{{old('lat', $request -> lat)}}">
        <input id='long' type="text" name="long" value="{{old('long', $request -> long)}}">
      </div>
      <button id="mainbutton" type="submit" name="button">
        <h1>
          Cerca
        </h1>
      </button>
      <div class="filters-section">
        <div class="filters-number">
          <div class="filters-number-column">

            <label for="bathrooms">Bagni</label>
            {{-- <input id="roomsbath" type="number" name="bathrooms" min="0" value="0"> --}}
            <input id='rangeinputB' type="range" name="bathrooms"
            @if(isset($request -> bathrooms) )
              value="{{old('bathrooms', $request -> bathrooms)}}"
            @else
              value="0"
            @endif
             min='0' max='10' oninput="
            bathroomsOutputId.value = rangeinputB.value">
            <output  name="bathroomsOutputValue" id="bathroomsOutputId">
              @if (isset($request -> bathrooms) )
                  {{old('bathrooms', $request -> bathrooms)}}
              @else
              0
              @endif
            </output>
          </div>
          <div class="filters-number-column">

            <label for="distance">Distanza</label>
            <input id='rangeinputD' type="range" name="distance"
            @if(isset($request -> distance) )
              value="{{old('distance', $request -> distance)}}"
            @else
              value="20"
            @endif
             min='1' max='250' oninput="distanceOutputId.value = rangeinputD.value">
            <output name="distanceOutputValue" id="distanceOutputId">
              @if (isset($request -> distance) )
                  {{old('distance', $request -> distance)}}
              @else
              20
              @endif

            </output>
          </div>
          <div class="filters-number-column">

            <label for="rooms">Stanze</label>
            {{-- <input id="roomsbath" type="number" name="rooms" min="0" value="0"> --}}
            <input id='rangeinputR' type="range" name="rooms"
            @if(isset($request -> rooms) )
              value="{{old('bathrooms', $request -> rooms)}}"
            @else
              value="0"
            @endif
             min='0' max='20' oninput="roomsOutputId.value = rangeinputR.value">
            <output name="roomsOutputValue" id="roomsOutputId">
              @if (isset($request -> rooms) )
                  {{old('bathrooms', $request -> rooms)}}
              @else
              0
              @endif

            </output>
          </div>

        </div>

        <div class="filters-checkbox">
          <label for="services[]"></label>
          @foreach ($services as $service)
          <div class="service">
            <div>
              @if ($service -> name === 'WiFi')
                <i class="fas fa-wifi"></i>

              @elseif ($service -> name === 'Posto macchina')
                <i class="fas fa-taxi"></i>

              @elseif ($service -> name === 'Piscina')
                <i class="fas fa-swimming-pool"></i>

              @elseif ($service -> name === 'Portineria')
                <i class="fas fa-concierge-bell"></i>

              @elseif ($service -> name === 'Sauna')
                <i class="fas fa-hot-tub"></i>

              @elseif ($service -> name === 'Vista mare')
                <i class="fas fa-water"></i>

              @elseif ($service -> name === 'Aria condizionata')
                <i class="fas fa-wind"></i>

              @endif

              {{$service -> name}}
            </div>

            <input  type="checkbox" name="services[]" value="{{$service -> name}}"
            @if (isset($request-> services))
              @foreach ($request -> services as $service_r)
              @if ($service_r == $service -> name )
              checked
              @endif
              @endforeach
            @endif

            > <br>
          </div>
          @endforeach
        </div>

      </div>

    </form>

  </div>

  <div class="main_search_bar_query">
    <div class="apartments">
      <div class="results-section">

          <div class="results-apartments">
            @foreach ($apartments_pay  as $sponsoredApp)
              <div id="sponsoredbox" class="box-result-apartment">

                <div class="image-apartment">
                  <img src="{{$sponsoredApp -> image}}" alt="">
                </div>
                <div class="info-apartment">
                  <h2>{{$sponsoredApp -> title}}</h2>
                  <p>{{$sponsoredApp -> city}}</p>
                  <hr>
                  <p>Numero di stanze &#183; {{$sponsoredApp -> rooms}}</p>
                    <p id='lat' class="latitude">{{$sponsoredApp -> latitude}}</p>
                    <p id='long' class="longitude">{{$sponsoredApp -> longitude}}</p>
                    <hr>
                    <p>
                    @foreach ($sponsoredApp['services'] as $service)
                      &#183; {{ $service['name'] }}
                    @endforeach
                    </p>
                    <a href="{{route('show-apartment', $sponsoredApp -> id)}}">
                      <button  type="button" name="button">Mostra Appartamento in evidenza</button>
                    </a>
                </div>

              </div>
            @endforeach
        @if (@count($appartamenti) > 0)
            @foreach ($appartamenti as $apartment)
              <div class="box-result-apartment">

                <div class="image-apartment">
                  <img src="{{$apartment['stats']['image']}}" alt="">
                </div>
                <div class="info-apartment">
                  <h2>{{$apartment['stats']['title']}}</h2>

                  <p>a <span class="km-distance">{{$apartment['stats']['distance']}}</span> km da {{$request -> q}}</p>
                  <hr>
                  <p>Numero di stanze &#183; {{$apartment['stats']['rooms']}}</p>
                    <p id='lat' class="latitude">{{$apartment['stats']['latitude']}}</p>
                    <p id='long' class="longitude">{{$apartment['stats']['longitude']}}</p>
                    <hr>
                    <p>
                    @foreach ($apartment['services'] as $service)

                      &#183; {{ $service }}
                    @endforeach
                    </p>
                    <a href="{{route('show-apartment', $apartment['stats']['apartment_id'])}}">
                      <button  type="button" name="button">Mostra Appartamento</button>
                    </a>
                </div>


              </div>
            @endforeach

        @else
        <p style="margin: 100px 140px;">Non ci sono appartamenti che rispecchiano i parametri inseriti</p>
      @endif
        </div>
      </div> {{-- fine sezione results --}}
    </div> {{-- fine sezione appartamenti --}}


    <div class="map" id="map">
    </div>
      <div class="move_up" style='opacity: 0'>
        <i class="fa fa-angle-double-up" ></i>
      </div>

  </div> {{-- fine sezione generale ricerca --}}



  <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.59.0/maps/maps-web.min.js'></script>
  <script src="{{ asset('js/search.js') }}" defer></script>
@endsection
