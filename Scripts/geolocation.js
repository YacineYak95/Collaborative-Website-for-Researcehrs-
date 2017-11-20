
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}



function initMap() {


  var directionsDisplay = new google.maps.DirectionsRenderer;
  var directionsService = new google.maps.DirectionsService;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: {lat: 37.77, lng: -122.447}
  });
  directionsDisplay.setMap(map);

  calculateAndDisplayRoute(directionsService, directionsDisplay);
  document.getElementById('mode').addEventListener('change', function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  });
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
 var xhttp = new XMLHttpRequest();
  var xmlContent;
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText);
      text = this.responseText;
    parser = new DOMParser();
    xmlDoc = parser.parseFromString(text,"text/xml");
    var markerNodes = xmlDoc.getElementsByTagName("marker");
    var lat = parseFloat(markerNodes[0].getAttribute("lat"));
    var lng = parseFloat(markerNodes[0].getAttribute("lng"));



if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(function(position) {
              var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                     };
    var selectedMode = document.getElementById('mode').value;
  directionsService.route({
    origin: {lat: pos.lat, lng: pos.lng},  // Haight.
    destination: {lat: lat, lng: lng},  // Ocean Beach.
    // Note that Javascript allows us to access the constant
    // using square brackets and a string value as its
    // "property."
    travelMode: google.maps.TravelMode[selectedMode]
  }, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
        });
  }

    }
  };
  xhttp.open("GET", "http://localhost:8888/Controllers/getXml.php", true);
  xhttp.send();

}



