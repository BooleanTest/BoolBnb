
@extends('layouts.app')

@section('content')

  @php
    echo '<div style = "display:none" class="visual_mesi">' . implode('', $visual_mesi) . '</div>' ;
    echo '<div style="display:none" class="visual_messaggi">' . implode('', $visual_messaggi) . '</div>'
  @endphp


  <div class="main-stats">

    {{-- counters --}}
    <div class="counters">

      <div class="counter-stats">
        <h3>Visualizzazioni totali 2020:</h3>
        <p class='total_view'>{{$total_view_20 -> toarray()[0]['tot_view']}}</p>
      </div>

      <div class="counter-stats">
        <h3>Messaggi ricevuti 2020:</h3>
        <p class='total_messages'>{{$total_messages_2020 -> toarray()[0]['tot_messages']}}</p>
      </div>

    </div>

    {{-- line chart --}}
    <div class="line">

      <div class="counter-stats">
        <h3>Visualizzazioni totali 2020:</h3>
        <p class='total_view'>{{$total_view_20 -> toarray()[0]['tot_view']}}</p>
      </div>

      <div class="line-graph">

        <canvas id="views-line"></canvas>

      </div>

      <div class="counter-stats">
        <h3>Messaggi ricevuti 2020:</h3>
        <p class='total_messages'>{{$total_messages_2020 -> toarray()[0]['tot_messages']}}</p>
      </div>

      <div class="line-graph">

        <canvas id="mex-line"></canvas>

      </div>
    </div>

    {{-- bar charts --}}
    <div class="bar">

      <div class="counter-stats">
        <h3>Visualizzazioni totali 2020:</h3>
        <p class='total_view'>{{$total_view_20 -> toarray()[0]['tot_view']}}</p>
      </div>

      <div class="bar-graph">

        <canvas id="views-bar"></canvas>


      </div>

      <div class="counter-stats">
        <h3>Messaggi ricevuti 2020:</h3>
        <p class='total_messages'>{{$total_messages_2020 -> toarray()[0]['tot_messages']}}</p>
      </div>

      <div class="bar-graph">

        <canvas id="mex-bar"></canvas>

      </div>
    </div>


  </div>

  <div class="bottone-promuovi">

    <button id="promuovistats" type="button" name="button">
      <a href="{{route("payment", $apartments -> id)}}">Promuovi appartamento</a>
    </button>

  </div>

@endsection
