$(document).ready(function(){



    var nomeStrada = $(".streetName");
    var numeroStrada = $(".streetNumber");
    var municipio = $(".municipality");

    if (nomeStrada.val() != '' && numeroStrada.val() != '' && municipio.val() != ''){
      $('#button').prop('disabled', false);
      $('#button').removeClass("error");
      console.log('dovrei aver tolto quella merda di classe error, ma non lo faccio perchè sono stronzo');
    }

    console.log(nomeStrada.val(),
numeroStrada.val(),
municipio.val());


    nomeStrada.keyup(apiCoordinate);
    numeroStrada.keyup(apiCoordinate);
    municipio.keyup(apiCoordinate);
    nomeStrada.keydown(apiCoordinate);
    numeroStrada.keydown(apiCoordinate);
    municipio.keydown(apiCoordinate);


   function apiCoordinate(){

     var streetName = $(".streetName").val();
     var streetNumber = $(".streetNumber").val();
     var municipality = $(".municipality").val();



     if (nomeStrada.val() != '' && numeroStrada.val() != '' && municipio.val() != ''){
       $.ajax({
         url: 'https://api.tomtom.com/search/2/structuredGeocode.json?key=fdEClAfoJx3PxxAZWCgLqh3ApTZlAcuF&countryCode=it&streetNumber=<streetNumber>&streetName=<streetName>&municipality=<municipality>',
         data: {
           streetNumber: streetName,
           streetName: streetNumber,
           municipality: municipality
         },
         method: 'get',
         success: function (data){

          console.log('sto chiamando');

           var longitude = data.results[0].position.lon;
           var latitude = data.results[0].position.lat;
           var position = [longitude, latitude];

           $('#latitude').val(latitude);
           $('#longitude').val(longitude);

           $('#button').prop('disabled', false);
           $('#button').removeClass("error");

         },
         error: function(error){

           console.log(error);

         }
       });
     } else {
       $('#button').addClass("error");
       console.log('non chiamo');

     }


   }





     //   $('#form').submit(function(e){
     // e.preventDefault();
     //     var form_data = $(this);
     //
     //     console.log(form_data.serialize())
     //
     //
     //
     //       var streetName = $(".streetName").val();
     //       var streetNumber = $(".streetNumber").val();
     //       var municipality = $(".municipality").val();
     //
     //       $.get( 'https://api.tomtom.com/search/2/structuredGeocode.json?key=HPIuQNQKJvFfEyPKVEciiGGYx8Fs3ptB&countryCode=it&streetNumber=<streetNumber>&streetName=<streetName>&municipality=<municipality>', { streetNumber: streetName,  streetName: streetNumber, municipality: municipality } )
     //       .done(function( data ) {
     //         var longitude = data.results[0].position.lon;
     //         var latitude = data.results[0].position.lat;
     //         var position = [longitude, latitude];
     //
     //         $('#latitude').val(latitude);
     //         $('#longitude').val(longitude);
     //         $('#plong').text(longitude);
     //         $('#plat').text(latitude);
     //         $('#plong').text(longitude);
     //         $('#plat').text(latitude);
     //       })
     //       .done(function(data){
     //         // e.preventDefault();
     //
     //
     //         var route = $('#form').data('route');
     //
     //          // $('#longitude').val();
     //         // console.log(form_data.serialize());
     //         console.log($('#longitude').val());
     //         $.ajax({
     //           headers: {
     //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //           } ,
     //           url: route,
     //           data: {
     //             long: $('#longitude').val()
     //           },
     //           method: "post",
     //           success: function (response){
     //             console.log('HO POSTATO I FILES!');
     //             console.log(response);
     //
     //           },
     //           error: function(error){
     //             console.log('ERRORE' + (error));
     //           }
     //         })
     //
     //
     //
     //       });
     //

     //     });



  //    $.get
  //    ( ,
  //    {streetNumber: streetName,  streetName: streetNumber, municipality: municipality}
  //     function() {
  // $( ".result" ).html( data );
  // alert( "Load was performed." );



     // $('#form').submit(function(e){
     //
     //
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
     //       console.log(Response);
     //
     //     },
     //     error: function(error){
     //       console.log('errore controller');
     //     }
     //   })
     //
     //   e.preventDefault();
     //
     // })
   });
