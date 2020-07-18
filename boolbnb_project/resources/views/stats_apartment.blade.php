
@extends('layouts.app')

@section('content')


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
