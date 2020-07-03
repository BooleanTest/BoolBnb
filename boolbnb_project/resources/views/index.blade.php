@extends('layouts.app')

@section('content')
  <ul>

    @foreach ($apartments as $apartment)
      <li>
        <a href="{{route('apartment', $apartment -> id)}}">
          {{$apartment -> address}} {{$apartment -> number}}
        </a>

        {{$apartment -> user -> name}}
      </li>
    @endforeach
  </ul>
@endsection
