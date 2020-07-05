@extends('layouts.app')

@section('content')

  @if (session("success"))
    <p>{{session("success")}}</p>
  @endif

  <h2>Appartamenti</h2>

  <a href="{{route("create-apartment")}}"><button type="button" name="button">Inserisci appartamento</button></a>
  <ul>

    @foreach ($apartments as $apartment)
      <li>
        <a href="{{route('show-apartment', $apartment -> id)}}">
          {{$apartment -> address}} {{$apartment -> number}}
        </a>

        {{$apartment -> user -> name}}
      </li>
    @endforeach
  </ul>
@endsection
