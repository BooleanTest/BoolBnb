@extends('layouts.app')

@section('content')
  <div class="search-section">
    <form class="" action="{{route('search')}}" method="post">
      {{ csrf_field() }}
      <div class="searchbar-section">
        <label for="searchbox">cerca</label>
        <input id="query" type="text" name="searchbox" value="">

        <button type="submit" name="button">Cerca</button>

        <input id='lat' type="text" name="lat" value="">
        <input id='long' type="text" name="long" value="">
      </div>
      <div class="filters-section">
        <div class="filters-number">
          <label for="distance">Distanza</label>
          <input type="number" name="distance" value="50">
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
            <input  type="checkbox" name="services[]" value="{{$service -> id}}"> <br>
          </div>
          @endforeach
        </div>

      </div>

    </form>

  </div>
  <div class="results-section">
    @if (@isset($apartments))
      <div class="results-apartments">
        @foreach ($apartments as $apartment)
          <div class="box-result-apartment">
            <div class="image-apartment">
              <a href="{{route('show-apartment', $apartment -> apartment_id)}}">{{$apartment -> image}}</a>
            </div>
            <div class="info-apartment">
              nome appartamento: <a href="{{route('show-apartment', $apartment -> apartment_id)}}">{{$apartment -> title}}</a> <br>
              città: <a href="{{route('show-apartment', $apartment -> apartment_id)}}">{{$apartment -> city}}</a> <br>
              distanza dal centro: {{round($apartment -> distance, 2)}} km <br>
              servizi: {{$apartment -> service_name}}
            </div>
          </div>
        @endforeach
      </div>
    @else
      Nessun appartamento presente
    @endif
  </div>

  <script src="{{ asset('js/search.js') }}" defer></script>
@endsection
