
@extends('layouts.app')

@section('content')

  <div class="clicks">

    {{$apartments -> title}}
  </div>

  PROMUOVI APPARTAMENTO <br>

  {{-- <a value='2.99' href="#">2.99</a> <br>
  <a href="#">5.99</a> <br>
  <a href="#">9.99</a> <br> --}}

  <a href="{{route("payment", $apartments->id)}}">Scegli pacchetto</a>
@endsection
