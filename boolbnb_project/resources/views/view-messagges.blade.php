
@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Lista Messaggi</h1>


  <div class="container_message">
    <div class="scritte">
      <div class="text_mail">
        <h1>Email</h1>
      </div>
      <div class="testo">
        <h1>Testo</h1>
      </div>
    </div>
    @foreach ($messages as $message)
    <div class="messaggio">
      <div class="mail">
        <h3>{{$message -> mail}}</h3>
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
