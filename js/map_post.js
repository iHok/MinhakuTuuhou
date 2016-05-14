$(document).ready(function()
    {

        /**
         * 送信ボタンクリック
         */
        $('#send').click(function()
        {
        	alert($('#hidden_ido').val());
        	//POSTメソッドで送るデータを定義します var data = {パラメータ名 : 値};
            var data = {user_name : $('#user_name').val(),
            			user_url : $('#user_url').val(),
	        			user_comment : $('#user_comment').val(),
	        			user_password : $('#user_password').val(),
	        			hidden_ido : $('#hidden_ido').val(),
	        			hidden_keido : $('#hidden_keido').val(),
	        			hidden_zoom : $('#hidden_zoom').val(),
            			hidden_address : $('#hidden_address').val()};

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
                    alert($('#user_name').val());
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
