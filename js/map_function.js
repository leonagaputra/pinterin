// Sets the map on all markers in the array.
var map;
var markers = [];

function addMarker(loc) {
    var marker = new google.maps.Marker({
        position: loc,
        map: map
    });
    markers.push(marker);
}

function addMarker2(){
    var marker = new google.maps.Marker({
        position: {lat:-6.17539, lng:106.82715},
        map: map,
        title: 'Hello World!'
      });
}

function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
    setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    markers = [];
}