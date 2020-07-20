
@extends('layouts.app')

@section('content')

  mesi view:
  @foreach ($visual_mesi as $value)
    {{$value}}
  @endforeach
  <br>
  mesi messaggi:
  @foreach ($visual_messaggi as $messaggio)
    {{$messaggio}}
  @endforeach
 <br>
  total message 2020: {{$total_messages_2020}}
  total message 2019: {{$total_messages_2019}}
  <br>
  total view 2019: {{$total_view_19}}
  total view 2020: {{$total_view_20}}
  <br>
  <div class="title-stats">
    <h1>Statistiche appartamento</h1>
  </div>

  <div class="main-stats">

    {{-- counters --}}
    <div class="counters">

      <div class="counter-stats">
        <h3>Visualizzazioni totati</h3>
        <p>50</p>

      </div>
      <div class="counter-stats">
        <h3>Messaggi ricevuti</h3>
        <p>50</p>

      </div>
    </div>

    {{-- line chart --}}
    <div class="line">

      <div class="line-graph">

        <canvas id="views-line"></canvas>

      </div>
      <div class="line-graph">

        <canvas id="mex-line"></canvas>

      </div>
    </div>

    {{-- bar charts --}}
    <div class="bar">

      <div class="bar-graph">

        <canvas id="views-bar"></canvas>


      </div>
      <div class="bar-graph">

        <canvas id="mex-bar"></canvas>

      </div>
    </div>


  </div>

  <a href="{{route("payment", $apartments -> id)}}">Promuovi appartamento</a>

@endsection
