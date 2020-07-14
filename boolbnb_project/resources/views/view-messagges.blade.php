
@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Lista Messaggi</h1>

@foreach ($messages as $message)

  {{$message -> mail}}

@endforeach
</div>




@endsection
