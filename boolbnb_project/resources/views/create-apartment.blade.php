
@extends('layouts.app')
@section('content')
<div class="containeredit">
  <h2>Inserisci Appartamento</h2>
  @if ($errors->any())
  @foreach ($errors->all() as $error)
  <p>{{$error}}</p>
  @endforeach
  @endif
  <form id='form' action="{{route('store-apartment')}}"  method='post'>
    @csrf
    @method('post')
    <div class="dati">
      <h3>Dati Appartamento</h3>
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
      <div class="valore">
        <div class="label">
          <label for="latitude">Latitudine : </label>
        </div>
        <span id="plat"></span>
        <input id="latitude" type="text" name="latitude" value="" class="none"><br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="longitude">Longitudine : </label>
        </div>
        <span id="plong"></span>
        <input id="longitude" type="text" name="longitude" value="" class="none">
        <br>
        <button type="button" id="calcolo" name="calcolo">Calcola</button><br><br><br>
      </div>

    </div>
    <div class="servizi">
      <h2>Servizi</h2>
      <label for="services[]"></label> <br>
      @foreach ($services as $service)
      <div class="servizietto">
        <span>{{$service -> name}}</span>
        <input  type="checkbox" name="services[]" value="{{$service -> id}}"> <br>
      </div>
      @endforeach
    </div>
    <div class="bottoni">
      <a href="{{route('home')}}"><button type="button" name="button" class="red">Indietro</button></a>
      <a href="#"><button  id='button' type="submit" name="submit">Salva</button></a>
    </div>
  </form>
  <script src="{{ asset('js/geocoding.js') }}" defer></script>
</div>
@endsection
