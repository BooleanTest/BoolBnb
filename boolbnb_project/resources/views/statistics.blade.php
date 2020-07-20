@extends('layouts.app')
@section('content')


  <canvas id="views"></canvas>
  <script type="text/javascript">
    var mese_view = {{ $month_views }}
  </script>

  <canvas id="messages"></canvas>
  <script type="text/javascript">
    var mese_mex = {{ $month_messages }}
  </script>


@endsection
