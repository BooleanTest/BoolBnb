@include('header')
@extends('layouts.app')


@section('content')

<div class="container">
  <div class="profilo">
    <div class="top">
      <div class="floatl">
        <h1>Benvenuto, ecco la lista degli appartamenti da lei inseriti</h1>
      </div>
      <div class="floatr">
        <a href="{{route("create-apartment")}}" class="buttonleft"><button type="button" name="button">INSERISCI APPARTAMENTO</button></a>
        <a href="{{route('view-messagges', Auth::user() -> id)}}" class="buttonright"><button type="button" name="button"><i class="far fa-envelope white"></i></button></a>
      </div>

    </div>

    @foreach ($user -> apartments as $apartment)
      <div class="appartamento">
        <div class="titolo">
          <h2>{{$apartment -> title}}</h2>

        </div>
        <div class="immagine">
          <img src="{{$apartment -> image}}" alt="">
        </div>
        <div class="scritte">
          <div class="bottoni">
            <a href="#"><button type="button" name="button" class="eliminazionetasto right red">Elimina</button></a>
            <div class="eliminatasto">
              <div class="eliminazione none">
                <div class="eliscritte">
                  <h3>Sei sicuro di volere eliminare l'appartamento?</h3>
                  <h4>Una volta persi i dati non potranno più essere recuperati!</h4>
                </div>
                <div class="elibuttons">
                  <button type="button" name="button" class="back">Indietro</button>
                  <a href="{{route("delete-apartment", $apartment["id"])}}"><button type="button" name="button" class="right red" id="cancella">Elimina</button></a>
                </div>
                <script type="text/javascript">
                  $('.eliminazionetasto').click(function(){
                    $('.eliminazione').removeClass('none');
                  });
                  $('.back').click(function(){
                    $('.eliminazione').addClass('none');
                  });
                </script>
              </div>
            </div>
            <a href="{{ route('edit-apartment', $apartment -> id ) }}"><button type="button" name="button" class="right light">Modifica</button></a>
          </div>
          <div class="pi">
            <p><a href="{{route('show-apartment', $apartment -> id)}}">Dati Appartamento</a></p>
            <p><a href="{{route('stats', $apartment -> id)}}">Statistiche</a></p>

            @if ($apartment -> time < time())

              <p><a href="{{route("payment", $apartment -> id)}}">Promuovi</a></p>

              @if ($apartment -> visibility)
                <p><a href="{{route('visibility', $apartment -> id)}}">Rendi l'appartamento invisibile</a></p>
              @else
                <p><a href="{{route('visibility', $apartment -> id)}}">Rendi l'appartamento visibile</a></p>
              @endif
            @else
              <p style='color: #e70036f0'>Questo appartamento è sponsorizzato!</p>
            @endif





          </div>

        </div>

      </div>
    @endforeach
  </div>
</div>



@endsection
