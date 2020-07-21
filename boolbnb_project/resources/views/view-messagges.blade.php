
@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Lista Messaggi</h1>


  <div class="container_message">
    @foreach ($messages as $message)
    <div class="messaggio">
      <div class="mail">
        <h3>{{$message -> mail}}</h3>
        <a href="{{route('show-apartment' , $message -> apartment_id )}}"><p>{{$message -> title}}</p></a>
      </div>
      <div class="text">
        <h3>{{$message -> text}}</h3>
      </div>
    </div>
    @endforeach
    <a href="{{ url()->previous()}}"><button type="button" name="button" id="indietro">Indietro</button></a>
  </div>



</div>




@endsection
