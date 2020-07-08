<!DOCTYPE html>
<html class='use-all-space'>
<head>
    <meta http-equiv='X-UA-Compatible' content='IE=Edge' />
    <meta charset='UTF-8'>
    <title>My Map</title>
    <meta name='viewport'
          content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'/>
    <!-- Replace version in the URL with desired library version -->
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.59.0/maps/maps.css'/>
    <style>
       #map {
           width: 50vw;
           height: 50vh;
       }
    </style>
</head>
<body>
    <div id='map' class='map'></div>
 <!-- Replace version in the URL with desired library version -->
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.59.0/maps/maps-web.min.js'></script>
    <script>
      tt.map({
          key: 'HPIuQNQKJvFfEyPKVEciiGGYx8Fs3ptB',
          container: 'map',
          style: 'tomtom://vector/1/basic-main'
      });
      map.addControl(new tt.FullscreenControl());
      map.addControl(new tt.NavigationControl());
    </script>
</body>
</html>
