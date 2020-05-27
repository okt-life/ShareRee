//*検索を押すと発生するイベント
  $(document).on('click','#modal-open',function(){
      //console.log('クリックされた！');
      $(this).blur();
      if($("modal-overlay")[0]) return false;
      $("body").append('<div id="modal-overlay"></div>');
      $("#modal-overlay").fadeIn("slow");
      centeringModalWindow();
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
