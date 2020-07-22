
@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Lista Messaggi</h1>


  <div class="container_message">
    @foreach ($messages as $message)
    <div class="messaggio">
      <div class="mail">
        <div class="info">
          <p>Riferito all'appartamento: </p>
          <a  class="text_mex" href="{{route('show-apartment' , $message -> apartment_id )}}"><p>{{$message -> title}}</p></a>
        </div>
        <div class="info">
          <p>Inviato da: </p>
          <p class="text_mex" >{{$message -> mail}}</p>

        </div>
        <div class="info">
          <p>Ricevuto in data: </p>
          <p class="text_mex" >{{$message -> data}}</p>
        </div>
      </div>
      <div class="text">
        <h3>{{$message -> text}}</h3>
      </div>
    </div>
    @endforeach
    <a href="{{ url()->previous()}}"><button type="button" name="button" id="indietro">Indietro</button></a>
  </div>



</div>

{{-- <h3>Riferito all'appartamento: </h3>
<a href="{{route('show-apartment' , $message -> apartment_id )}}"><p>{{$message -> title}}</p></a>
<h3>Inviato da: </h3>
<h4>{{$message -> mail}}</h4>
<h3>Ricevuto in data: </h3>
<h4>{{$message -> data}}</h4> --}}


@endsection
