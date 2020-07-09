
 $(document).ready(function(){


     $.ajax({
       url: 'https://api.tomtom.com/search/2/structuredGeocode.json?key=HPIuQNQKJvFfEyPKVEciiGGYx8Fs3ptB&countryCode=it&streetNumber=<streetNumber>&streetName=<streetName>&municipality=<municipality>',
       data: {
         streetNumber: '3',
         streetName: 'garibaldi',
         municipality: 'napoli'
       },
       method: 'get',
       success: function (data){
         console.log('sono la latitudine = ' + data.results[0].position.lat + 'sono la longitudine = ' + data.results[0].position.lon);
         // console.log(data[results][]);

         console.log('funziono!');
         var longitude = data.results[0].position.lon;
         var latitude = data.results[0].position.lat;
         var position = [longitude, latitude];
         var map = tt.map({
             key: 'HPIuQNQKJvFfEyPKVEciiGGYx8Fs3ptB',
             container: 'map',
             style: 'tomtom://vector/1/basic-main',
             zoom: 10,
             center: position,
             basePath: 'sdk/',
             source: 'vector'
         });
         var marker = new tt.Marker()
         .setLngLat(position)
         .addTo(map);
       },
       error: function(error){
         // console.error(error);
         console.log('Ciao sono un errore');
       }
     })

   })
