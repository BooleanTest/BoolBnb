@extends('layouts.app')

@section('content')
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

@endsection
