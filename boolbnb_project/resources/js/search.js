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

      // $('#mainbutton').click({
      //   $('html,body').animate({ scrollTop: 50}, 'slow');
      // })
      // $('#mainbutton').click({
      //   $(document).scrollTop( $("#header").offset().top );
      // })

      var width = $(window).width();
      if (width < 901){
        moveTop(605);
      } else if (width < 1201){
        moveTop(425);
      } else {
        moveTop(460);
      }

      // animazione che al search dell'appartamento muove la pagina nel div risultati

      $('.move_up').click(function(){
          $("html, body").animate({ scrollTop: 0 }, 1000);
          console.log();
          // $('.move_up').fadeOut(1000);
      });

      $(window).scroll(function(){
        if($('.move_up').offset().top <= 550){
          $('.move_up').css('opacity', '0');
          console.log('ciao');
        } else {
          $('.move_up').css('opacity', '1');
        }
      })


      function moveTop(where){
        $("html, body").animate({ scrollTop: where }, 1000);
      }



});
