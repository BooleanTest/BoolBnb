$(document).ready(function(){




    $('#query').keyup(function(){
      var query = $('#query').val();
      console.log(query);

      $.ajax({
        url: 'https://api.tomtom.com/search/2/structuredGeocode.json?key=fdEClAfoJx3PxxAZWCgLqh3ApTZlAcuF&countryCode=it&municipality=<municipality>',
        data: {
          municipality: query
        },
        method: 'get',
        success: function (data){

            var longitude = data.results[0].position.lon;
            var latitude = data.results[0].position.lat;
            var position = [longitude, latitude];
            console.log(latitude, longitude);

            $('#lat').val(latitude);
            $('#long').val(longitude);

        },
        error: function(error){

          $('#error').text('non esiste alcun campo')
        }
      });

    })

      var position = [9.4, 43.4];
      var map = tt.map({
          key: 'fdEClAfoJx3PxxAZWCgLqh3ApTZlAcuF',
          container: 'map',
          style: 'tomtom://vector/1/basic-main',
          zoom: 5,
          center: position,
          basePath: 'sdk/',
          source: 'vector'
      });


      $('.box-result-apartment').click(function(){

        var marker = ' ';
        var latitude = $(this).find('.latitude').text();
        var longitude = $(this).find('.longitude').text();

        newPosition = [longitude, latitude];

        var marker = new tt.Marker()
        .setLngLat(newPosition)
        .addTo(map);

         map.flyTo({center: newPosition, zoom: 11});

      });

      $('.sponsored').click(function(){

        var marker = ' ';
        var latitude = $(this).find('.latitude').text();
        var longitude = $(this).find('.longitude').text();

        newPosition = [longitude, latitude];

        var marker = new tt.Marker()
        .setLngLat(newPosition)
        .addTo(map);

         map.flyTo({center: newPosition, zoom: 11});

      });



});
