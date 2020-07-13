
@extends('layouts.app')

@section('content')


    <form class="search-h-form" action="" method="post">

      <div class="search-h-bar">

        <div class="search-filter">

          <label for="">Distanza</label>
          <input type="range" name="" value="">

          <label for="">Bagni</label>
          <input type="number" min="1" value="0">

          <label for="">Stanze</label>
          <input type="number" min="1" value="0">

        </div>

      </div>
      <div class="search-h-box">

        <label for="">
          <input id="h-search-input" type="text" name="h-search-input" value="" placeholder="Dove vuoi andare?">
        </label>

        <div id="search-button">
          <a href="#">
            <i class="fas fa-plane fa-4x"></i>
          </a>
        </div>

      </div>

      <div class="search-checkbox">

        <label for="">WiFi</label>
        <input type="checkbox" name="" value="">
        <label for="">Posto Macchina</label>
        <input type="checkbox" name="" value="">
        <label for="">Piscina</label>
        <input type="checkbox" name="" value="">
        <label for="">Portineria</label>
        <input type="checkbox" name="" value="">
        <label for="">Sauna</label>
        <input type="checkbox" name="" value="">
        <label for="">Vista Mare</label>
        <input type="checkbox" name="" value="">

        <label for="">Reimposta valori</label>
        <input type="reset">

      </div>


    </form>

    @if (@isset($apartments))
      <div class="ciao">
        @foreach ($apartments as $apartment)
          <a href="{{route('show-apartment', $apartment -> id)}}">{{$apartment -> title}}</a> <br>
        @endforeach
      </div>
    @else
      Nessun appartamento presente
    @endif





@endsection
