@include('header')
@extends('layouts.app')

@section('content')

  <h2>Inserisci Appartamento</h2>

  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <p>{{$error}}</p>
    @endforeach
  @endif

  <form  action="{{route('store-apartment')}}" method="post">
    @csrf
    @method('POST')

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
    <input type="text" name="city" value="{{ old('city')}}">

    <br>

    <label for="address">Indirizzo</label>
    <input type="text" name="address" value="{{ old('address')}}">

    <br>

    <label for="number">Numero civico</label>
    <input type="text" name="number" value="{{ old('number')}}">

    <br>

    <label for="image">Immagine</label>
    <input type="text " name="image" value="{{ old('image')}}">

    <br> <br>

    <label for="services[]">Servizi</label> <br>
      @foreach ($services as $service)
        {{$service -> name}}
        <input  type="checkbox" name="services[]" value="{{$service -> id}}"> <br>
      @endforeach


    <a href="{{route('home')}}"><button type="button" name="button">Indietro</button></a>

    <button type="submit" name="submit">Salva</button>

  </form>




@endsection
