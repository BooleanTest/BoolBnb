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
    <script src='https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js'></script>
    <div class="payment">
      @foreach ($payments as $payment)
        <div class="">
          <input type="radio" name="payment" value="{{$payment -> name}}">
          {{$payment -> name}}
          {{$payment -> price}}
        </div>
      @endforeach
    </div>
    <div id='dropin-container'></div>
    <button id='submit-button' disabled>Paga</button>


    <div class="">
      <input type="text" name="apartmentId" value="{{$apartment -> id }}" disabled style="display: none">
    </div>


    <script>

    var ApartmentId = $('input[name=apartmentId]').val();

    $('.payment').on('click', "input[type=radio]", function () {


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
                alert('pagamento effettuato');
              } else {
                console.log("esito negativo");
                alert('pagamento fallito');
              }
            }, 'json');
          });
        });
      });
    });
    </script>

  @endif



@endsection
