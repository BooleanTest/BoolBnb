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
        <label for="title">Titolo : </label>
        <input type="text" name="title" value="{{ old('title', $apartments -> title) }}">
        <br>
      </div>
      <div class="valore">
        <label for="rooms">Stanze : </label>
        <input type="number" name="rooms" value="{{ old('rooms', $apartments -> rooms) }}">
        <br>
      </div>
      <div class="valore">
        <label for="bathrooms">Bagni : </label>
        <input type="number" name="bathrooms" value="{{ old('bathrooms', $apartments -> bathrooms) }}">
        <br>
      </div>
      <div class="valore">
        <label for="meters">Metri quadrati : </label>
        <input type="number" name="meters" value="{{ old('meters', $apartments -> meters) }}">
        <br>
      </div>
      <div class="valore">
        <label for="nation">Nazione : </label>
        <input type="text" name="nation" value="{{ old('nation', $apartments -> nation)}}">
        <br>
      </div>
      <div class="valore">
        <label for="city">Città : </label>
        <input type="text" name="city" value="{{ old('city', $apartments -> city)}}">
        <br>
      </div>
      <div class="valore">
        <label for="address">Indirizzo : </label>
        <input type="text" name="address" value="{{ old('address', $apartments -> address) }}">
        <br>
      </div>
      <div class="valore">
        <label for="number">Numero civico : </label>
        <input type="text" name="number" value="{{ old('number', $apartments -> number) }}">
        <br>
      </div>
      <div class="valore">
        <label for="image">Immagine </label>
        <input type="text" name="image" value="{{ old('image', $apartments -> image) }}">
        <br>
      </div>
    </div>
    <div class="servizi">

    </div>


    {{-- {{dd($apartments -> services)}} --}}

    <label for="services[]">Servizi</label> <br>
    @foreach ($services as $service)
    {{$service -> name}}
    <input

    type="checkbox" name="services[]" value="{{$service -> id}}"

    @foreach ($apartments -> services as $service_apartment)
    @if ($service_apartment -> id == $service -> id )
    checked
    @endif
    @endforeach
    > <br>
    @endforeach

    <a href="{{route('show-apartment', $apartments["id"])}}"><button type="button" name="button">Indietro</button></a>

    <button type="submit" name="submit">Salva</button>

  </form>

</div>

@endsection
