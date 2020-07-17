@include('header')
@extends('layouts.app')


@section('content')

<div class="container">
  <div class="profilo">
    <div class="top">
      <div class="floatl">
        <h1>Benvenuto, ecco la lista degli appartamenti da lei inseriti</h1>
      </div>
      <div class="floatr">
        <a href="{{route("create-apartment")}}"><button type="button" name="button">INSERISCI APPARTAMENTO</button></a>
            <a href="{{route('view-messagges', Auth::user() -> id)}}"><button type="button" name="button"><i class="far fa-envelope white"></i></button></a>
      </div>

    </div>

    @foreach ($user -> apartments as $apartment)
      <div class="appartamento">
        <div class="titolo">
          <h2>{{$apartment -> title}}</h2>

        </div>
        <div class="immagine">
          <img src="{{$apartment -> image}}" alt="">
        </div>
        <div class="scritte">
          <div class="bottoni">
            <a href="{{route('delete-apartment', $apartment['id'])}}"><button type="button" name="button" class="right red">Elimina</button></a>
            <a href="{{ route('edit-apartment', $apartment -> id ) }}"><button type="button" name="button" class="right light">Modifica</button></a>
          </div>
          <div class="pi">
            <p><a href="{{route('show-apartment', $apartment -> id)}}">Dati Appartamento</a></p>
            <p><a href="{{route('stats', $apartment -> id)}}">Statistiche Appartamento</a></p>
            <p><a href="{{route("payment", $apartment -> id)}}">Promuovi appartamento</a></p>
          </div>

        </div>

      </div>
    @endforeach
  </div>
</div>



@endsection
