{{-- "w" sta per welcome --}}

<main class="main-w-apartments">

  <div class="heading-w-apartments">
    <h2> Gli appartamenti in evidenza </h2>
  </div>
  <div class="container-w-apartments">
    @foreach ($apartments as $apartment)
      <div class="w-apartment">

        <a href="{{ route('show-apartment', $apartment -> id ) }}">
          <img src="{{ $apartment -> image }}" alt="Immagine_Appartamento">
          <div class="title-w-apartment">
            <h3>{{ $apartment -> title }}</h3>
            <p>{{ $apartment -> address }}</p>
          </div>
        </a>

      </div>
    @endforeach
<<<<<<< Updated upstream
    

=======
>>>>>>> Stashed changes
  </div>

</main>
