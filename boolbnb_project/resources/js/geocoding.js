
 $(document).ready(function(){
   var streetName = $(".streetName").val();
   var streetNumber = $(".streetNumber").val();
   var municipality = $(".municipality").val();

     $.ajax({
       url: 'https://api.tomtom.com/search/2/structuredGeocode.json?key=HPIuQNQKJvFfEyPKVEciiGGYx8Fs3ptB&countryCode=it&streetNumber=<streetNumber>&streetName=<streetName>&municipality=<municipality>',
       data: {
         streetNumber: streetNumber ,
         streetName: streetName,
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
         
         console.log('Ciao sono un errore');
       }
     })

     $('#form').submit(function(e){
       // console.log('ecco i dati');
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
           console.log('cè un errore');
         }
       })
       e.preventDefault();

     })





   })
