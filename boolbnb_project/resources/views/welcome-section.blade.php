{{-- "w" sta per welcome --}}

<main class="main-w-apartments">

  <div class="heading-w-apartments">
    <h2> Appartamenti in evidenza </h2>
  </div>

  <div class="container-w-apartments">

    @if ($apartments_pay)
      @foreach ($apartments_pay as $apartment)
        <div class="w-apartment">

          <a href="{{ route('show-apartment', $apartment -> id ) }}">
            <img src="{{ $apartment -> image }}" alt="Immagine_Appartamento">
            <div class="title-w-apartment">
              <h3>{{ $apartment -> title }}</h3>
              <hr>
              <p>{{ $apartment -> address }}</p>
              <p>{{ $apartment -> city }}</p>
            </div>
          </a>

        </div>
      @endforeach
    @endif

  </div>

  <div class="heading-w-apartments">
    <h2> Paradisi da sogno </h2>
  </div>

</main>
