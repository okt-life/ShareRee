<!DOCTYPE html>
<html lang="ja">
    <head>
      <meta charaset="UTF-8">
      <link rel="stylesheet" type="text/css" href="registConfirm.css">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <!--<script type="text/javascript" src="C:\xampp\htdocs\registConfilm.js"></script>-->
    </head>
    <title>本の登録</title>
      <body>
       <script>
        //検索を押すと発生するイベント
          $(document).on('click','#modal-open',function(){
              //console.log('クリックされた！');
              $("body").append('<div id="modal-overlay"></div>');
              $("#modal-overlay").fadeIn("slow");
              $("#modal-content").fadeIn("slow");

              //↓ここ動作しない（2020.05.18）
              //contentのセンタリング(画面幅ーコンテンツ幅/2)
              function centeringModalWindow(){
                var w =$(window).width();
                var h =$(window).height();
                var cw =$("#modal-content").outerWidth({margin:true});
                var ch =$("#modal-content").outerHeight({margin:true});
                var pxleft =((w-cw/2));
              　var pxtop =((h-ch)/2);
              //cssへの設定
                $("#modal-content").css({"left":pxleft + "px"});
                $("#modal-content").css({"top":pxtop + "px"});
              }
         });

         //閉じると背景を押したらウィンドウを閉じる
         $(document).on('click',"#modal-overlay, #modal-close",function(){
            $("#modal-content,#modal-overlay").fadeOut("slow",function(){
              $("#modal-overlay").remove();})
         });

        </script>

        <button id="modal-open">検索</button>
        <div id="modal-content">
            <div id="modal-message">
                こちらの本でよろしいですか？
                　　<!--本の画像表示-->
                    <div class="book-img">
                        <img src="">
                    </div>
                      <!--本を選ぶ左右の矢印-->
                      <div class="selector"></div>
                        <button id="modal-close">閉じる</button>
                          <input type="button" id="decide" value="確定"></input>
            </div>
        </div>



        <!--jQueryの読み込み確認は、以下のコードを追加
        <script>
        $(function() {
          alert("jQueryが正常に動作しています！");
        });
      </script>-->

      </body>
</html>
