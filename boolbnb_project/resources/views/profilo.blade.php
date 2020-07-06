@extends('layouts.app')


@section('content')
  <a href="{{route("create-apartment")}}"><button type="button" name="button">Inserisci appartamento</button></a>


  <ul>
    @foreach ($user -> apartments as $apartment)
      <li>
        {{$apartment -> image}} {{$apartment -> title}} -> <a href="{{route('stats', $apartment -> id)}}">Statistiche</a>
      </li>
    @endforeach
  </ul>


@endsection
