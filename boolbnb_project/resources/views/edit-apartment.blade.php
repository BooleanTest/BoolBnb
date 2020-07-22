
@extends('layouts.app')

@section('content')
<div class="containeredit">
  <h2>Modifica Appartamento</h2>

  @if ($errors->any())
  @foreach ($errors->all() as $error)
  <p>{{$error}}</p>
  @endforeach
  @endif
  <form  action="{{route('update-apartment', $apartments['id'])}}" method="post" enctype='multipart/form-data'>
    @csrf
    @method('POST')
    <div class="dati">
      <h3> Dati Appartamento</h3>
      <div class="valore">
        <div class="label">
          <label for="title">Titolo : </label>
        </div>
        <input type="text" name="title" value="{{ old('title', $apartments -> title) }}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="rooms">Stanze : </label>
        </div>
        <input type="number" name="rooms" value="{{ old('rooms', $apartments -> rooms) }}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="bathrooms">Bagni : </label>
        </div>
        <input type="number" name="bathrooms" value="{{ old('bathrooms', $apartments -> bathrooms) }}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="meters">Metri quadrati : </label>
        </div>
        <input type="number" name="meters" value="{{ old('meters', $apartments -> meters) }}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="nation">Nazione : </label>
        </div>
        <input type="text" name="nation" value="{{ old('nation', $apartments -> nation)}}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="city">Città : </label>
        </div>
        <input type="text" class="municipality" name="city" value="{{ old('city', $apartments -> city)}}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="address">Indirizzo : </label>
        </div>
        <input type="text" class="streetName" name="address" value="{{ old('address', $apartments -> address) }}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="number">Numero civico : </label>
        </div>
        <input type="text" class="streetNumber" name="number" value="{{ old('number', $apartments -> number) }}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="image">Immagine : </label>
        </div>
        <input type="file" name="image" value="{{ old('image', $apartments -> image) }}">
        <br>
      </div>
      <div class="valore none">
        <div class="none" class="label">
          <label for="latitude">Latitudine : </label>
        </div>
        <span class="none" id="plat">{{ old('number', $apartments -> latitude) }}</span>
        <input id="latitude" type="text" name="latitude" value="{{ old('number', $apartments -> latitude) }}" class="none">
        <br>
      </div>
      <div class="valore none">
        <div class="none" class="label">
          <label for="longitude">Longitudine : </label>
        </div>
        <span class="none" id="plong">{{ old('number', $apartments -> longitude) }}</span>
        <input id="longitude" type="text" name="longitude" value="{{ old('number', $apartments -> longitude) }}" class="none">
        <br>

      </div>

      <br> <br>



    </div>
    <div class="servizi">
      {{-- {{dd($apartments -> services)}} --}}
      <h2>Servizi</h2>
      <label for="services[]"></label> <br>
      @foreach ($services as $service)
      <div class="left">
        <div class="servizietto">
          <h4>{{$service -> name}}</h4>
        </div>
        <div class="check">
          <input

          type="checkbox" name="services[]" value="{{$service -> id}}"

          @foreach ($apartments -> services as $service_apartment)
          @if ($service_apartment -> id == $service -> id )
          checked
          @endif
          @endforeach
          ><br>
        </div>
      </div>



      @endforeach
    </div>
    <div class="bottoni">
      <a href="{{route('show-apartment', $apartments["id"])}}"><button type="button" name="button" class="red">Indietro</button></a>
      <a href="#"><button class="error" id="button" type="submit" name="submit" >Salva</button></a>
    </div>







  </form>

</div>

<script src="{{ asset('js/geocoding.js') }}" defer></script>

@endsection
