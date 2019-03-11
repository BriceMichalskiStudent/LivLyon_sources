
function displayMap(){
    var x = document.getElementById("mapid");
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}


function showPosition(position) {

    if (!zoom){
        var zoom = 14;
    }

    if (typeof center !== 'undefined' ){
        var mymap = L.map('mapid').setView([center.latitude,center.longitude], zoom);
    }else{
        var mymap = L.map('mapid').setView([position.coords.latitude,position.coords.longitude], zoom);
    }

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiYnJpY2VtaSIsImEiOiJjam5xMW04d20xa3BkM3FtcXZhb2kzaXhvIn0.JCS3xdxgX5JZMH-iEG_fCg'
    }).addTo(mymap);


    var positionIcon = L.icon({
        iconUrl: '/img/position.png',


        iconSize:     [50, 50], // size of the icon
        iconAnchor:   [25, 25], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
    L.marker([position.coords.latitude,position.coords.longitude], {icon: positionIcon}).addTo(mymap);

    markers.forEach(function (marker) {
        marker.addTo(mymap)
    });
}
