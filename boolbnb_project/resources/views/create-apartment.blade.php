
@extends('layouts.app')
@section('content')
<div class="containeredit">
  <h2>Inserisci Appartamento</h2>
  @if ($errors->any())
  @foreach ($errors->all() as $error)
  <p>{{$error}}</p>
  @endforeach
  @endif
  <form id='form' action="{{route('store-apartment')}}"  method='post' enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="dati">
      <h3>Dati Appartamento</h3>

      <p id='errore'></p>
      <div class="valore">
        <div class="label">
          <label for="title">Titolo : </label>
        </div>
        <input type="text" name="title" value="{{ old('title')}}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="rooms">Stanze : </label>
        </div>
        <input type="number" name="rooms" value="{{ old('rooms')}}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="bathrooms">Bagni : </label>
        </div>
        <input type="number" name="bathrooms" value="{{ old('bathrooms')}}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="meters">Metri quadrati : </label>
        </div>
        <input type="number" name="meters" value="{{ old('meters')}}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="nation">Nazione : </label>
        </div>
        <input type="text" name="nation" value="{{ old('nation')}}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="city">Città : </label>
        </div>
        <input type="text" class="municipality" name="city" value="{{ old('city')}}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="address">Indirizzo : </label>
        </div>
        <input type="text" class="streetName" name="address" value="{{ old('address')}}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="number">Numero civico : </label>
        </div>
        <input type="text" class="streetNumber" name="number" value="{{ old('number')}}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="image">Immagine : </label>
        </div>
        <input type="file" name="image" value="{{ old('image')}}"><br>
      </div>
      <div class="valore none">
        <div class="label">
          <label class='none' for="latitude">Latitudine : </label>
        </div>
        <span class='none' id="plat"></span>
        <input id="latitude" class='none' type="text" name="latitude" value="{{old('latitude')}}" ><br>
      </div>
      <div class="valore none">
        <div class="label">
          <label class='none' for="longitude">Longitudine : </label>
        </div>
        <span class='none' id="plong"></span>
        <input id="longitude" class='none' type="text" name="longitude" value="{{old('longitude')}}" >
        <br>

      </div>

    </div>
    <div class="servizi">
      <h2>Servizi</h2>
      <label for="services[]" class="none"></label> <br>
      @foreach ($services as $service)
      <div class="left">
        <div class="servizietto">
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

          <h4>{{$service -> name}}</h4>
        </div>
        <div class="check">
          <input  type="checkbox" name="services[]" value="{{$service -> id}}"> <br>
        </div>
      </div>
      @endforeach
    </div>
    <div class="bottoni">
      <a href="{{route('home')}}"><button  type="button" name="button" class="red">Indietro</button></a>
      <a href="#"><button  disabled id='button' class='error' type="submit" name="submit">Salva</button></a>
    </div>
  </form>
  <script src="{{ asset('js/geocoding.js') }}" defer></script>
</div>
@endsection
