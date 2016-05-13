function initialize() {
 var Marker;
 var map;
//中心座標は沖縄県庁の緯度、経度。地図の形式はROADMAPを選択
 var latlng = new google.maps.LatLng(35.681298,139.766247);
 var opts = {
  zoom: 12,
  center: latlng,
  mapTypeId: google.maps.MapTypeId.ROADMAP
 }
//id属性に"map_canvas"を指定しdiv要素を対象とするMapsクラスのオブジェクトを作成
 map = new google.maps.Map
 (document.getElementById("map_canvas"),opts);

//地図上でクリックするとマーカーを表示させ、マーカーは移動可能とするイベント登録
 google.maps.event.addListener(map, 'click',
 function(event) {
  if (Marker){Marker.setMap(null)};
  Marker = new google.maps.Marker({
   position: event.latLng,
   draggable: true,
   map: map
  });
  infotable(Marker.getPosition().lat(),
  Marker.getPosition().lng(),map.getZoom());
  geocode();
  //マーカー移動後に座標を取得するイベントの登録
  google.maps.event.addListener(Marker,'dragend',
   function(event) {
   infotable(Marker.getPosition().lat(),
   Marker.getPosition().lng(),map.getZoom());
   geocode();
  })
  //ズーム変更後に倍率を取得するイベントの登録
  google.maps.event.addListener(map, 'zoom_changed',
   function(event) {
   infotable(Marker.getPosition().lat(),
   Marker.getPosition().lng(),map.getZoom());
  })
 })
//マーカーの位置を地図座標に変換するジオコーディングの設定
 function geocode(){  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({ 'location': Marker.getPosition()},
     function(results, status) {
   if (status == google.maps.GeocoderStatus.OK && results[0]){
     document.getElementById('id_address').value =
         results[0].formatted_address.replace(/^日本, /, '');
   }else{
     document.getElementById('id_address').value =
       "Geocode 取得に失敗しました";
    alert("Geocode 取得に失敗しました reason: "
           + status);
   }
  });
 }

//HTMLtagを更新
 function infotable(ido,keido,level){
  document.getElementById('id_ido').value = ido;
  document.getElementById('id_keido').value = keido;
  document.getElementById('id_level').value = level;
 };
};