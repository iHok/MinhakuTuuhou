var map;
var tokyo = new google.maps.LatLng(35.697456,139.702148);
var marker_list = new google.maps.MVCArray();
var currentInfoWindow = null;

function initialize() {
  var opts = {
    zoom: 11,
    center: tokyo,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map
(document.getElementById("map_canvas"), opts);
}

function setPoint(name,url,ido,keido,zoom) {
	var point = new google.maps.LatLng(ido,keido);
	marker_list.forEach(function(mkr, idx){mkr.setMap(null);});
	var marker = new google.maps.Marker({
		position: point,
		map: map,
	});
	marker_list.push(marker);
	marker.setMap(map);
	map.setCenter(point);
	map.setZoom(zoom);
	if (currentInfoWindow) {
		currentInfoWindow.close();
	}
	var infoWndOpts = {
			content : '建物名:'+name+'<br>URL:'+url,
		};
	var infoWnd = new google.maps.InfoWindow(infoWndOpts);
	infoWnd.open(map, marker);
	currentInfoWindow = infoWnd;
}
