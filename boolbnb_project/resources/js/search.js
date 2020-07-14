$(document).ready(function(){




    $('#query').keyup(function(){
      var query = $('#query').val();
      console.log(query);

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
            console.log(latitude, longitude);

            $('#lat').val(latitude);
            $('#long').val(longitude);

        },
        error: function(error){

          $('#error').text('non esiste alcun campo')
        }
      });


    })


  // var route = $('.search-h-form').data('search');
  //
  // console.log(route);
  //
  //  $('#search-button').submit(function(e){
  //
  //   e.preventDefault();
  //
  //   var query = $('#h-search-input').val();
  //   var route = $('.search-h-form').data('search');
  //   var form_data = $(this);
  //   console.log(query);
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
  //
  //
  //
  // })

//   jQuery(document).ready(function(){
//
//     var route = $('.search-h-form').data('search');
//
//             jQuery('#search-button').click(function(e){
//                e.preventDefault();
//                // $.ajaxSetup({
//                //    headers: {
//                //         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//                //    }
//               // });
//                $.ajax({
//                   // headers: {
//                   //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                   // },
//                   url: route,
//                   method: 'post',
//                   data: {
//                      city: jQuery('#city').val()
//                   },
//                   success: function(result){
//                      console.log('ciao');
//                   },
//                   error: function(error){
//                     console.log(error);
//                   }
//                 });
//                });
//             });
// //
//
});