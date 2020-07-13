@include('header')
@extends('layouts.app')

@section('content')


  <h2>Inserisci Appartamento</h2>

  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <p>{{$error}}</p>
    @endforeach
  @endif

  <form id='form' action="{{route('store-apartment')}}"  method='post'>

    @csrf
    @method('post')

    <label for="title">Titolo</label>
    <input type="text" name="title" value="{{ old('title')}}">

    <br>

    <label for="rooms">Stanze</label>
    <input type="number" name="rooms" value="{{ old('rooms')}}">

    <br>

    <label for="bathrooms">Bagni</label>
    <input type="number" name="bathrooms" value="{{ old('bathrooms')}}">

    <br>

    <label for="meters">Metri quadrati</label>
    <input type="number" name="meters" value="{{ old('meters')}}">

    <br>

    <label for="nation">Nazione</label>
    <input type="text" name="nation" value="{{ old('nation')}}">

    <br>

    <label for="city">Città</label>
    <input type="text" class="municipality" name="city" value="{{ old('city')}}">

    <br>

    <label for="address">Indirizzo</label>
    <input type="text" class="streetName" name="address" value="{{ old('address')}}">

    <br>

    <label for="number">Numero civico</label>
    <input type="text" class="streetNumber" name="number" value="{{ old('number')}}">

    <br>

    <label for="image">Immagine</label>
    <input type="text " name="image" value="{{ old('image')}}"><br>

    <button type="button" id="calcolo" name="calcolo">Calcola</button><br>

    <label for="latitude">latitude</label>
    <input id="latitude" type="text" name="latitude" value=""><br>

    <label for="longitude">longitude</label>
    <input id="longitude" type="text" name="longitude" value="">
    <br> <br>





    <label for="services[]">Servizi</label> <br>
      @foreach ($services as $service)
        {{$service -> name}}
        <input  type="checkbox" name="services[]" value="{{$service -> id}}"> <br>
      @endforeach


    <a href="{{route('home')}}"><button type="button" name="button">Indietro</button></a>

    <button  id='button' type="submit" name="submit">Salva</button>



  </form>

  <script src="{{ asset('js/geocoding.js') }}" defer></script>



@endsection
