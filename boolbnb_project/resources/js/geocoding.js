
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
         // console.log(data[results][]);

         console.log('funziono!');
         var longitude = data.results[0].position.lon;
         var latitude = data.results[0].position.lat;
         var position = [longitude, latitude];
       },
       error: function(error){
         // console.error(error);
         console.log('Ciao sono un errore');
       }
     })

     $.ajax({
       // headers: {
       //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       // } ,
       url: "http://127.0.0.1:8000/store-apartment",
       method: "post",
       success: function (data){
         console.log("funzioniamo entrambi");
         console.log("longitude");
       },
       error: function(error){
         console.log('cè un errore');
       }
     })

   })
