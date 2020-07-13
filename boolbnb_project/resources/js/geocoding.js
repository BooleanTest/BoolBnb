$(document).ready(function(){

<<<<<<< Updated upstream
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
           console.log('sono la latitudine = ' + data.results[0].position.lat + 'sono la longitudine = ' + data.results[0].position.lon);

           var longitude = data.results[0].position.lon;
           var latitude = data.results[0].position.lat;
           var position = [longitude, latitude];

           // document.getElementById("latitude").innerHTML =  latitude ;
           $('#latitude').val(latitude);
           $('#longitude').val(longitude);

         },
         error: function(error){

           console.log('errore dati');
         }
       });
     });

     $('#form').submit(function(e){
       var route = $('#form').data('route');
       var form_data = $(this);

       $.ajax({
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         } ,
         url: route,
         data: form_data.serialize(),
         method: "post",
         success: function (Response){


         },
         error: function(error){
           console.log('errore controller');
         }
       })
     })
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
       e.preventDefault();
   });
=======

    $('#form').submit(function(e){

      var streetName = $(".streetName").val();
      var streetNumber = $(".streetNumber").val();
      var municipality = $(".municipality").val();

      var route = $('#form').data('route');
      var form_data = $(this);





      $.when(



        $.ajax({
          url: 'https://api.tomtom.com/search/2/structuredGeocode.json?key=HPIuQNQKJvFfEyPKVEciiGGYx8Fs3ptB&countryCode=it&streetNumber=<streetNumber>&streetName=<streetName>&municipality=<municipality>',
          data: {
            streetNumber: streetName,
            streetName: streetNumber,
            municipality: municipality
          },
          method: 'get',
          success: function (data){
            console.log('sono la latitudine = ' + data.results[0].position.lat + 'sono la longitudine = ' + data.results[0].position.lon);

            var longitude = data.results[0].position.lon;
            var latitude = data.results[0].position.lat;
            var position = [longitude, latitude];

            // document.getElementById("latitude").innerHTML =  latitude ;
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);

          },
          error: function(error){

            console.log('errore dati');
          }
        })


      ).then(



        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          } ,
          url: route,
          data: form_data.serialize(),
          method: "post",
          success: function (Response){


          },
          error: function(error){
            console.log('errore controller');
          }
        })


      );


      e.preventDefault();
      // console.log('ecco i dati');




    })

  })
>>>>>>> Stashed changes
