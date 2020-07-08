@include('header')
@extends('layouts.app')

@section('content')

  @if (session("success"))
    <p>{{session("success")}}</p>
  @endif

<div class="container_show">
  <div class="margin">
    <div class="nave">
      <div class="scritte">
        <h1>{{$apartments -> title }}</h1>
        <p>{{$apartments -> city }} , {{$apartments -> nation }} , {{$apartments -> address }}</p>
      </div>
      <div class="modifica">
        {{-- controllo per far vedere i comandi --}}
        @auth

        @if (Auth::user() -> id === $apartments -> user -> id)

        <a href="{{ route('edit-apartment', $apartments -> id ) }}"><button type="button" name="button">Modifica</button></a>

        <a href="{{route("delete-apartment", $apartments["id"])}}"><button type="button" name="button">Elimina</button></a>
        @endif
        @endauth
      </div>
    </div>
    <div class="nave">
      <div class="immagine">
        <img src="{{$apartments -> image }}" alt="">
      </div>
      <div class="mappa">
        <div id='map' class='map'>
          @include ('map');
        </div>
      </div>

    </div>
    <div class="table">
      <div class="dati">
        <h2>DATI APPARTAMENTO</h2>
        <h3>Appartamento di {{$apartments -> meters }} mq², affittato da {{$apartments -> user -> name}} {{$apartments -> user -> lastname}}</h3>
        <h3>N° stanze: {{$apartments -> rooms }}</h3>
        <h3>Numero bagni:  {{$apartments -> bathrooms }}</h3>
      </div>
      <div class="servizi">
        <h2>SERVIZI</h2>
        <ul>
          @foreach ($apartments -> services as $service)
          <li>
            {{$service -> name}}
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="messaggio table">
      <h2>Scrivi al proprietario</h2>
      <form  action="{{route('store-messagge', $apartments -> id)}}" method="post">
        @csrf
        @method('POST')

        <label for="mail"></label>
        <input type="text" id="mail" name="mail" value="" placeholder="Inserisci email">
        <br>
        <label for="text"></label>
        <input type="text" id="text" name="text" value="" placeholder="Inserire messaggio.." style="HEIGHT:1px;">
        <br>
        <button type="submit" name="submit">Invia Messaggio</button>

      </form>
    </div>

    <a href="{{ url()->previous()}}"><button type="button" name="button" id="indietro">Indietro</button></a>
  </div>

</div>










@endsection
