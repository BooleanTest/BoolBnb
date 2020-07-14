
@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Lista Messaggi</h1>

  @foreach ($messagges as $messagge)
    <h1>{{$messagge -> mail}}</h1>
  @endforeach;
</div>




@endsection
