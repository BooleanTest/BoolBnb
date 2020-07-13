$(document).ready(function(){

  $('#search-button').click(function(ricerca){

    var query = $("#h-search-input").val();
    console.log('Al click: ' + query);

    $.ajax({
      url: 'https://api.tomtom.com/search/2/structuredGeocode.json?key=HPIuQNQKJvFfEyPKVEciiGGYx8Fs3ptB&countryCode=it&municipality=<municipality>',
      data: {
        municipality: query
      },
      method: 'get',
      success: function (data){

        var longitude = data.results[0].position.lon;
        var latitude = data.results[0].position.lat;
        var position = [longitude, latitude];


      },
      error: function(error){

        console.log('errore chiamata ajax non riuscita');
      }
    });

  });

  // $('#form').submit(function(e){
  //   var route = $('#form').data('route');
  //   var form_data = $(this);
  //
  //   $.ajax({
  //     headers: {
  //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //     } ,
  //     url: route,
  //     data: form_data.serialize(),
  //     method: "post",
  //     success: function (Response){
  //
  //
  //     },
  //     error: function(error){
  //       console.log('errore controller');
  //     }
  //   })
  // })
    // console.log('ecco i dati');
    // setTimeout(, 3000);
    // $.ajax({
    //   headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //   } ,
    //   url: route,
    //   data: form_data.serialize(),
    //   method: "post",
    //   success: function (Response){
    //
    //     console.log(Response);
    //
    //   },
    //   error: function(error){
    //     console.log('errore controller');
    //   }
    // })
    // e.preventDefault();

});
