
<script type="text/javascript"
 src="http://maps.google.com/maps/api/js?libraries=adsense&sensor=false&language=ja"></script>
<!--function initializeで地図の初期画面構成を設定-->

<script type="text/javascript">
function initialize() {
 var Marker;
 var map;
//中心座標は沖縄県庁の緯度、経度。地図の形式はROADMAPを選択
 var latlng = new google.maps.LatLng(26.212377176525983,127.68079876899719);
 var opts = {
  zoom: 17,
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
</script>

    <script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
    <script>
	alert("test");
    $(document).ready(function()
    {

        /**
         * 送信ボタンクリック
         */
        $('#send').click(function()
        {
            //POSTメソッドで送るデータを定義します var data = {パラメータ名 : 値};
            var data = {id_ido : $('#id_ido').val(),
            			id_keido : $('#id_keido').val(),
            			id_level : $('#id_level').val(),
            			id_address : $('#id_address').val()};

            /**
             * Ajax通信メソッド
             * @param type  : HTTP通信の種類
             * @param url   : リクエスト送信先のURL
             * @param data  : サーバに送信する値
             */
            $.ajax({
                type: "POST",
                url: "index.php?action=post&layout=none",
                data: data,
                /**
                 * Ajax通信が成功した場合に呼び出されるメソッド
                 */
                success: function(data, dataType)
                {
                    //successのブロック内は、Ajax通信が成功した場合に呼び出される

                    //PHPから返ってきたデータの表示
                    alert(data);
                },
                /**
                 * Ajax通信が失敗した場合に呼び出されるメソッド
                 */
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                    //通常はここでtextStatusやerrorThrownの値を見て処理を切り分けるか、単純に通信に失敗した際の処理を記述します。

                    //this;
                    //thisは他のコールバック関数同様にAJAX通信時のオプションを示します。

                    //エラーメッセージの表示
                    alert('Error : ' + errorThrown);
                }
            });

            //サブミット後、ページをリロードしないようにする
            return false;
        });
    });
    </script>
<p>地図上で目的地をクリックすると座標・住所を取得できます。

<form method="post">
<table style="width:500px;border:0;" >
<tr><td width="50px">緯度</td><td><input type="text" id="id_ido"/></td></tr>
<tr><td>経度</td><td><input id="id_keido" type="text" /></td></tr>
<tr><td>ズーム</td><td><input id="id_level" type="text" /></td></tr>
<tr><td>住所</td><td><input id="id_address" type="text" /></td></tr>
</table>
<p><input id="send" value="送信" type="submit" /></p>
</form>
<div id="map_canvas" style="width:480px; height:300px"></div>
<br>
<a href="http://www.google-mapi.com/company.shtml" target="blank">
Google Maps JavaScript API V3の使い方</a>を参考に作成
</body>
</html>