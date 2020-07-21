
@extends('layouts.app')

@section('content')

<div class="tutto">
  <div class="container_show">
    @if (session("success"))
    <p class="success">{{session("success")}}</p>
    @endif
    <div class="margin">
      <div class="nave ">
        <div class="scritte">
          <h1>{{$apartments -> title }}</h1>
          <p>{{$apartments -> city }} , {{$apartments -> nation }} , {{$apartments -> address }} n° {{$apartments -> number}}</p>
        </div>
        <div class="modifica">
          {{-- controllo per far vedere i comandi --}}
          @auth
          @if (Auth::user() -> id === $apartments -> user -> id)
          <div class="eliminatasto">
            <button type="button" name="button" class="right red" id="eliminazionetasto">Elimina</button>
            <div class="eliminazione none">
              <div class="eliscritte">
                <h3>Sei sicuro di volere eliminare l'appartamento?</h3>
                <h4>Una volta persi i dati non potranno più essere recuperati!</h4>
              </div>
              <div class="elibuttons">
                <button type="button" name="button" id="back">Indietro</button>
                <a href="{{route("delete-apartment", $apartments["id"])}}"><button type="button" name="button" class="right red">Elimina</button></a>
              </div>
              <script type="text/javascript">
                $('#eliminazionetasto').click(function(){
                  $('.eliminazione').removeClass('none');
                });
                $('#back').click(function(){
                  $('.eliminazione').addClass('none');
                });
              </script>
            </div>
          </div>
          <a href="{{ route('edit-apartment', $apartments -> id ) }}"><button type="button" name="button" class="right ">Modifica</button></a>



          @endif
          @endauth
        </div>
      </div>
      <div class="nave foto">
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
          <ul>
            @foreach ($apartments -> services as $service)
            <li>
              @if ($service -> name === 'WiFi')
              <i class="fas fa-wifi"></i>
              @elseif ($service -> name === 'Posto macchina')
              <i class="fas fa-taxi"></i>

              @elseif ($service -> name === 'Cucina')
              <i class="fas fa-utensils"></i>

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
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      @Auth
      @if(Auth::user() -> id === $apartments -> user -> id)
      <div class="promuovi">
        <p><a href="{{route("payment", $apartments -> id)}}">Promuovi appartamento</a></p>
      </div>


      @else
      <div class="messaggio table">
        <h2>Scrivi al proprietario</h2>
        <form  action="{{route('store-messagge', $apartments -> id)}}" method="post">
          @csrf
          @method('POST')

          <label for="mail"></label>


          @Auth
          @if(Auth::user()-> id)
          <input type="text" id="mail" name="mail" value="{{Auth::user()->email}}">
          @endauth
          @else
          <input type="text" id="mail" name="mail" value="" placeholder="Inserisci l'email..">
          @endif

          <br>
          <label for="text"></label>
          <textarea name="text" id="text" cols="40" rows="15" placeholder= "Inserisci il testo..."></textarea>
          <br>
          <a href="#"><button type="submit" name="submit">Invia Messaggio</button></a>

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

          <input type="text" id="mail" name="mail" value="" placeholder="Inserisci l'email...">

          <br>
          <label for="text"></label>
          <textarea name="text" id="text" cols="40" rows="15" placeholder= "Inserisci il testo..."></textarea>
          <br>
          <a href="#"><button type="submit" name="submit">Invia Messaggio</button></a>

        </form>
      </div>
      @endif
      @Auth
      @if(Auth::user()-> id === $apartments -> user_id)
      <a href="{{route('profilo' , $apartments -> user_id)}}"><button type="button" name="button" id="indietro">Indietro</button></a>
      @else
      <a href="{{ url()->previous()}}"><button type="button" name="button" id="indietro">Indietro</button></a>
      @endAuth
      @else
      <a href="{{ url()->previous()}}"><button type="button" name="button" id="indietro">Indietro</button></a>
      @endif

    </div>



  </div>

</div>













@endsection
