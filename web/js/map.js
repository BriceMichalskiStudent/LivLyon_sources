
getLocation();
function getLocation() {
    var x = document.getElementById("mapid");
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

/*
showPosition();
function showPosition(position) {
    var mymap = L.map('mapid').setView([45.765765,4.856855], 15);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiYnJpY2VtaSIsImEiOiJjam5xMW04d20xa3BkM3FtcXZhb2kzaXhvIn0.JCS3xdxgX5JZMH-iEG_fCg'
    }).addTo(mymap);


}*/

function showPosition(position) {
    var mymap = L.map('mapid').setView([position.coords.latitude,position.coords.longitude], 15);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiYnJpY2VtaSIsImEiOiJjam5xMW04d20xa3BkM3FtcXZhb2kzaXhvIn0.JCS3xdxgX5JZMH-iEG_fCg'
    }).addTo(mymap);
    var marker = L.marker([45.765765, 4.856855]).addTo(mymap);
    marker.bindPopup("<b>Le Chien & Chat</b><br>Restaurant Chinois<br>")
    var locationLarge = L.circle([position.coords.latitude, position.coords.longitude], {
        color: '',
        fillColor: '#ff1715',
        fillOpacity: 0.5,
        radius: 30
    }).addTo(mymap);
    var location1 = L.circle([position.coords.latitude, position.coords.longitude], {
        color: '',
        fillColor: 'white',
        fillOpacity: 1,
        radius: 12
    }).addTo(mymap);
    var location2 = L.circle([position.coords.latitude, position.coords.longitude], {
        color: '',
        fillColor: '#ff1715',
        fillOpacity: 1,
        radius: 10
    }).addTo(mymap);


}



