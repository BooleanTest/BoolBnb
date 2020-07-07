@extends('layouts.app')

@section('content')
  <h2>Modifica</h2>

  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <p>{{$error}}</p>
    @endforeach
  @endif

  <form  action="{{route('update-apartment', $apartments['id'])}}" method="post">
    @csrf
    @method('POST')

    <label for="title">Titolo</label>
    <input type="text" name="title" value="{{ old('title', $apartments -> title) }}">

    <br>

    <label for="rooms">Stanze</label>
    <input type="number" name="rooms" value="{{ old('rooms', $apartments -> rooms) }}">

    <br>

    <label for="bathrooms">Bagni</label>
    <input type="number" name="bathrooms" value="{{ old('bathrooms', $apartments -> bathrooms) }}">

    <br>

    <label for="meters">Metri quadrati</label>
    <input type="number" name="meters" value="{{ old('meters', $apartments -> meters) }}">

    <br>

    <label for="nation">Nazione</label>
    <input type="text" name="nation" value="{{ old('nation', $apartments -> nation)}}">

    <br>

    <label for="city">Città</label>
    <input type="text" name="city" value="{{ old('city', $apartments -> city)}}">

    <br>


    <label for="address">Indirizzo</label>
    <input type="text" name="address" value="{{ old('address', $apartments -> address) }}">

    <br>

    <label for="number">Numero civico</label>
    <input type="text" name="number" value="{{ old('number', $apartments -> number) }}">

    <br>

    <label for="image">Immagine</label>
    <input type="text" name="image" value="{{ old('image', $apartments -> image) }}">
    <br> <br>

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

@endsection
