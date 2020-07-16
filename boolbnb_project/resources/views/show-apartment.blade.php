
@extends('layouts.app')

@section('content')



<div class="container_show">
  @if (session("success"))
    <p class="success">{{session("success")}}</p>
  @endif
  <div class="margin">
    <div class="nave">
      <div class="scritte">
        <h1>{{$apartments -> title }}</h1>
        <p>{{$apartments -> city }} , {{$apartments -> nation }} , {{$apartments -> address }} n° {{$apartments -> number}}</p>
      </div>
      <div class="modifica">
        {{-- controllo per far vedere i comandi --}}
        @auth
        @if (Auth::user() -> id === $apartments -> user -> id)
        <div class="eliminatasto">
          <button type="button" name="button" class="right red ">Elimina</button>
          <div class="eliminazione">
            <h3>Sei sicuro di volere eliminare l'appartamento?</h3>
            <h4>Una volta persi i dati non potranno più essere recuperati!</h4>
            <button type="button" name="button">Indietro</button>
            <a href="{{route("delete-apartment", $apartments["id"])}}"><button type="button" name="button" class="right red">Elimina</button></a>
          </div>
        </div>
        <a href="{{ route('edit-apartment', $apartments -> id ) }}"><button type="button" name="button" class="right ">Modifica</button></a>



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
    @Auth
    @if(Auth::user() -> id === $apartments -> user -> id)
    <p><a href="{{route("payment", $apartments -> id)}}">Promuovi appartamento</a></p>

    @else
    <div class="messaggio table">
      <h2>Scrivi al proprietario</h2>
      <form  action="{{route('store-messagge', $apartments -> id)}}" method="post">
        @csrf
        @method('POST')

        <label for="mail"></label>


        @Auth
        @if(Auth::user()-> id)
        <input type="text" id="mail" name="mail" value="{{Auth::user()->email}} " disabled placeholder="Inserisci email" >
        @endauth
        @else
        <input type="text" id="mail" name="mail" value="" placeholder="Inserisci il testo..">
        @endif

        <br>
        <label for="text"></label>
        <textarea name="text" id="text" cols="40" rows="15" placeholder= "Inserisci il testo..."></textarea>
        <br>
        <button type="submit" name="submit">Invia Messaggio</button>

      </form>
    </div>
    @endauth
    @else
    <div class="messaggio table">
      <h2>Scrivi al proprietario</h2>
      <form  action="{{route('store-messagge', $apartments -> id)}}" method="post">
        @csrf
        @method('POST')

        <label for="mail"></label>


        @Auth
        @if(Auth::user()-> id)
        <input type="text" id="mail" name="mail" value="{{Auth::user()->email}} " disabled placeholder="Inserisci email" >
        @endauth
        @else
        <input type="text" id="mail" name="mail" value="" placeholder="Inserisci il testo..">
        @endif

        <br>
        <label for="text"></label>
        <textarea name="text" id="text" cols="40" rows="15" placeholder= "Inserisci il testo..."></textarea>
        <br>
        <button type="submit" name="submit">Invia Messaggio</button>

      </form>
    </div>
    @endif

    <a href="{{ url()->previous()}}"><button type="button" name="button" id="indietro">Indietro</button></a>
  </div>



</div>










@endsection
