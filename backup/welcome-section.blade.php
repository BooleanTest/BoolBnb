{{-- "w" sta per welcome --}}

<main class="main-w-apartments">

  <div class="heading-w-apartments">
    <h2> Gli appartamenti in evidenza </h2>
  </div>
  <div class="container-w-apartments">
    @foreach ($apartments as $apartment)
      <div class="w-apartment">

        <div class="img-w-apartment">
          <img src="{{ $apartment -> image }}" alt="Immagine">
        </div>
        <div class="title-w-apartment">
          <h3>{{ $apartment -> title }}</h3>
        </div>

      </div>
    @endforeach
  </div>

</main>
