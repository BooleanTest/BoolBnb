@extends('layouts.app')
@section('content')
  <div class="search-section">

    <form class="" action="" method="post">

      <div class="searchbar">
        <label for="searchbox"></label>
        <input id="query" type="text" name="searchbox" value="">
        <button type="submit" name="button">
          <i class="fas fa-search"></i>
        </button>
      </div>

      <div class="filters-section">
        <div class="filters-number">
          <label for="distance">Distanza</label>
          <input type="number" name="distance" value="">
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
      <div class="result-apartment">
        @foreach ($apartments as $apartment)
          <a href="{{route('show-apartment', $apartment -> id)}}">{{$apartment -> title}}</a> <br>
        @endforeach
      </div>
    @else
      Nessun appartamento presente
    @endif
  </div>
@endsection
