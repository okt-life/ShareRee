$(function () {
    $("#submit").on('click', function () {
        var form = $(this).parents("Form");
        var param = form.serializeArray();
        console.log(param);
        var base_url = "/ShareRee/Books/test";
        $.ajax({
            url: base_url, //送り先のコントローラーのURL
            type: "POST", //post通信
            dataType: "json",
            data: {
                'params': param[1]["value"]
            },
            beforeSend: function () {
                $('.loading').removeClass('hide');
            }
        }).done(function (data) {
            $('#book-img').empty();
            $('.loading').addClass('hide');
            console.log(data);
            // 通信成功時の処理
            var count = data.length;
            for (var i = 0; i < count; i++) {
                $('#book-img').append('<a href="#"><img src=' + data[i] + '></a>');
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            // 通信失敗時の処理
            alert('ファイルの取得に失敗しました。');
            $('.loading').addClass('hide');
            console.log("ajax通信に失敗しました");
            console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
            console.log("textStatus     : " + textStatus); // タイムアウト、パースエラー
            console.log("errorThrown    : " + errorThrown.message); // 例外情報
        });
        return false;
    });
});
