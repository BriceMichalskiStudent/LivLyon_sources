
function displayMap(){
    var x = document.getElementById("mapid");
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}


function getLocationPoint(position){

    var locationLarge = L.circle([position.coords.latitude, position.coords.longitude], {
        color: '',
        fillColor: '#ff1715',
        fillOpacity: 0.5,
        radius: 30
    });
    var location1 = L.circle([position.coords.latitude, position.coords.longitude], {
        color: '',
        fillColor: 'white',
        fillOpacity: 1,
        radius: 12
    });
    var location2 = L.circle([position.coords.latitude, position.coords.longitude], {
        color: '',
        fillColor: '#ff1715',
        fillOpacity: 1,
        radius: 10
    });

    return [locationLarge,location1,location2];
}

function showPosition(position) {

    var mymap = L.map('mapid').setView([center.latitude,center.longitude], 15);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiYnJpY2VtaSIsImEiOiJjam5xMW04d20xa3BkM3FtcXZhb2kzaXhvIn0.JCS3xdxgX5JZMH-iEG_fCg'
    }).addTo(mymap);

    getLocationPoint(position).forEach(function (item) {
        item.addTo(mymap);
    });

    markers.forEach(function (marker) {
        marker.addTo(mymap)
    });
}
