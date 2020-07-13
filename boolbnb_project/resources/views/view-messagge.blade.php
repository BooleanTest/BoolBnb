@include('header')
@extends('layouts.app')

@section('content')

  <h1>{{$messagges -> mail}}</h1>
  <h2>{{$messagges -> text}}</h2>




@endsection
