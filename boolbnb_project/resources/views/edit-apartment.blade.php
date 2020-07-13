@include('header')
@extends('layouts.app')

@section('content')
<div class="containeredit">
  <h2>Modifica Appartamento</h2>

  @if ($errors->any())
  @foreach ($errors->all() as $error)
  <p>{{$error}}</p>
  @endforeach
  @endif
  <form  action="{{route('update-apartment', $apartments['id'])}}" method="post">
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
        <input type="text" name="city" value="{{ old('city', $apartments -> city)}}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="address">Indirizzo : </label>
        </div>
        <input type="text" name="address" value="{{ old('address', $apartments -> address) }}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="number">Numero civico : </label>
        </div>
        <input type="text" name="number" value="{{ old('number', $apartments -> number) }}">
        <br>
      </div>
      <div class="valore">
        <div class="label">
          <label for="image">Immagine </label>
        </div>
        <input type="file" name="image" value="{{ old('image', $apartments -> image) }}">
        <br>
      </div>
    </div>
    <div class="servizi">
      {{-- {{dd($apartments -> services)}} --}}
      <h2>Servizi</h2>
      <label for="services[]"></label> <br>
      @foreach ($services as $service)
      <div class="servizietto">
        <span>{{$service -> name}}</span>
        <input

        type="checkbox" name="services[]" value="{{$service -> id}}"

        @foreach ($apartments -> services as $service_apartment)
        @if ($service_apartment -> id == $service -> id )
        checked
        @endif
        @endforeach
        > <br>
      </div>



      @endforeach
    </div>
    <div class="bottoni">
      <a href="{{route('show-apartment', $apartments["id"])}}"><button type="button" name="button" class="red">Indietro</button></a>
      <a href="#"><button type="submit" name="submit" >Salva</button></a>
    </div>







  </form>

</div>

@endsection
