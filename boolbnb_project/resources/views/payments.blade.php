@extends('layouts.app')

@section('content')
    {{-- <script src="https://js.braintreegateway.com/web/dropin/1.23.0/js/dropin.js"></script>

  <div id="dropin-container"></div>
  <button id="submit-button" class="button button--small button--green">Purchase</button>

  <script>
  var button = document.querySelector('#submit-button');

  braintree.dropin.create({
  authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
  selector: '#dropin-container'
  }, function (err, instance) {
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
      // Submit payload.nonce to your server
    });
  })
  });
  </script> --}}


  @if (auth()->user()-> id == $apartment -> user_id)
    <div class="title-payment">
      <h1>Aumenta la tua visibilità</h1>
    </div>
    <div class="payment">
      @foreach ($payments as $payment)
        <div class="payment-box">

          <button type="button" name="payment" value="{{ $payment -> name }}">
          <h1>{{$payment -> name}}</h1>
          <h2>{{$payment -> price}}</h2>
          @if ($payment -> name == 'basic')
            <p>per 24 ore di sponsorizzazione</p>
          @elseif ($payment -> name == 'premium')
            <p>per 72 ore di sponsorizzazione</p>
          @elseif ($payment -> name == 'deluxe')
            <p>per 144 ore di sponsorizzazione</p>
          @endif
          </button>

        </div>
      @endforeach
    </div>

    <div class="alertbox"></div>

    <div id='dropin-container'></div>

    <div class="button-payments">

      <a href="{{ url()->previous()}}"><button type="button" name="button" id="indietro">Indietro</button></a>
      <button id='submit-button' disabled>Paga</button>

    </div>


    <div class="">
      <input type="text" name="apartmentId" value="{{ $apartment -> id }}" disabled style="display: none">
    </div>



    <script>

    var ApartmentId = $('input[name=apartmentId]').val();

    $(".payment .payment-box").click(function() {
      $(".payment .payment-box").removeClass("active");
      $(this).toggleClass( "active" );
    });

    $('.payment').on('click', "button[type=button]", function () {



      var paymentType = $(this).val();
      var button = $('#submit-button');
      button.prop("disabled", false);
      braintree.dropin.create({
        authorization: '{{ Braintree\ClientToken::generate() }}',
        container: '#dropin-container'
      },
      function (err, instance) {
        button.on('click', function () {
          instance.requestPaymentMethod(function (err, payload) {
            $.get('{{ route('payment-paid') }}', {payload, paymentType, ApartmentId}, function (response) {
              console.log("partita transazione");
              if (response.success) {
                console.log(response.transaction.amount);
                console.log("esito positivo");
                $('.alertbox')
                .html("<div class='alertgreen'> <span class='closebtn' onclick=" + "this.parentElement.style.display='none';" + ">&times;</span> Il pagamento è stato accettato </div>");
              } else {
                console.log("esito negativo");
                $('.alertbox')
                .html("<div class='alertred'><span class='closebtn' onclick=" + "this.parentElement.style.display='none';" + ">&times;</span> Pagamento non riuscito </div>");
              }
            }, 'json');
          });
        });
      });
    });

    </script>

  @endif



@endsection
