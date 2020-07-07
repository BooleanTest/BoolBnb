@extends('layouts.app')

@section('content')

  @if (session("success"))
    <p>{{session("success")}}</p>
  @endif

  <h2>Dettagli</h2>

  <ul>
    <b>title: </b>{{$apartments -> title }} <br>
    <b>rooms: </b>{{$apartments -> rooms }} <br>
    <b>bathrooms: </b>{{$apartments -> bathrooms }} <br>
    <b>meters: </b>{{$apartments -> meters }} <br>
    <b>address: </b>{{$apartments -> address }} <br>
    <b>number: </b>{{$apartments -> number }} <br>
    <b>latitude: </b>{{$apartments -> latitude }} <br>
    <b>longitude: </b>{{$apartments -> longitude }} <br>
    <b>image: </b>{{$apartments -> image }} <br>
    <b>user_id: </b>{{$apartments -> user_id }} <br>
    <br>

  </ul>

  <a href="{{route('home')}}"><button type="button" name="button">Indietro</button></a>

  <a href="{{ route('edit-apartment', $apartments -> id ) }}"><button type="button" name="button">Modifica</button></a>

  <a href="{{route("delete-apartment", $apartments["id"])}}"><button type="button" name="button">Elimina</button></a>

@endsection