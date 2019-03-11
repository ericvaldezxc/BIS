<!DOCTYPE html>
<html>
  <head>
    <style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
        function initMap() {
        var uluru = {lat: 14.615230, lng: 121.01791};
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 20, center: uluru});
        var marker = new google.maps.Marker({position: uluru, map: map});
        }
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5bjSh8aMfzB6CmZpYSlBjJg3SRn2075M&callback=initMap"async defer></script>

  </body>
</html>