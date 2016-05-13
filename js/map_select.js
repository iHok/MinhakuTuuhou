var map;
var tokyo = new google.maps.LatLng
(35.697456,139.702148);
var osaka = new google.maps.LatLng
(34.694203,135.502625);

function initialize() {
  var opts = {
    zoom: 11,
    center: tokyo,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map
(document.getElementById("map_canvas"), opts);
}

function setTokyo() {
  map.setCenter(tokyo);
}

function setOsaka() {
  map.setCenter(osaka);
}

function setPoint(ido,keido,zoom) {
	var point = new google.maps.LatLng(ido,keido);
	map.setCenter(point);
	map.setZoom(zoom);}
