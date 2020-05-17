$(function () {
    $("#form").on('click', function () {

        var form = $("#form");
        var param = form.serializeArray();
        var base_url = "http://127.0.0.1/ShareRee/practices/ajaxTest";
        $.ajax({
            url: base_url, //送り先のコントローラーのURL
            type: "post", //post通信
            dataType: "text", //json形式で送信
            data: param
        }).done(function (results) {
            // 通信成功時の処理
            $('#text').html(results);
            console.log("URL : " + url);
            console.log("results : " + results);
    }).fail(function (jqXHR, textStatus, errorThrown) {
            // 通信失敗時の処理
            alert('ファイルの取得に失敗しました。');
            console.log("ajax通信に失敗しました");
            console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
            console.log("textStatus     : " + textStatus);    // タイムアウト、パースエラー
            console.log("errorThrown    : " + errorThrown.message); // 例外情報
    });
    })
});
