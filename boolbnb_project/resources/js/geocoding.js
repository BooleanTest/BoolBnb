$(document).ready(function(){









     $('#calcolo').click(function(e){
       var streetName = $(".streetName").val();
       var streetNumber = $(".streetNumber").val();
       var municipality = $(".municipality").val();
       $.ajax({
         url: 'https://api.tomtom.com/search/2/structuredGeocode.json?key=HPIuQNQKJvFfEyPKVEciiGGYx8Fs3ptB&countryCode=it&streetNumber=<streetNumber>&streetName=<streetName>&municipality=<municipality>',
         data: {
           streetNumber: streetName,
           streetName: streetNumber,
           municipality: municipality
         },
         method: 'get',
         success: function (data){
           // console.log('sono la latitudine = ' + data.results[0].position.lat + 'sono la longitudine = ' + data.results[0].position.lon);
           var longitude = data.results[0].position.lon;
           var latitude = data.results[0].position.lat;
           var position = [longitude, latitude];
           // document.getElementById("latitude").innerHTML =  latitude ;
           $('#latitude').val(latitude);
           $('#longitude').val(longitude);
           $('#plong').text(longitude);
           $('#plat').text(latitude);
           $('#plong').text(longitude);
           $('#plat').text(latitude);
         },
         error: function(error){
           console.log('errore dati');
         }
       });
     });







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
