// Create a map object and specify the DOM element for display.
/* ------------------------------------------------------------------------ */
function initMap() {
    var uluru = {lat: -33.835955, lng: 151.123537};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}
initMap();
