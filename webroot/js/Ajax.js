//GoogleBooksApiの処理に関するクラス
class Googlebooksapi {

    constructor(data) {
        this.data = data;
    }
    showBooks(count) {
        for (var i = 0; i < count; i++) {
            //本のリンクを取得
            this.ImageLink = this.data['items'][i]['volumeInfo']['imageLinks']['thumbnail'];
            //本ごとに要素を作成
            $('#book-img').append('<div class="books book-ele' + i + '"></div>');
            //aタグで本の画像を表示
            $('.book-ele' + i).append('<a href="#"><img src=' + this.ImageLink + '></a>');
            this.getTitle(i);
            this.getdescription(i);
            this.getPublisher(i);
        }
    }
    getTitle(i) {
        this.title = this.data['items'][i]['volumeInfo']['title'];
        $('.book-ele' + i).append('<p>' + this.title + '</p>');
    }
    getdescription(i) {
        this.description = this.data['items'][i]['volumeInfo']['description'];
        $('.book-ele' + i).append('<p>' + this.description + '</p>');
    }
    getPublisher(i) {
        this.publisher = this.data['items'][i]['volumeInfo']['publisher'];
        $('.book-ele' + i).append('<p>' + this.publisher + '</p>');
    }

    getAuthors(count) {
        this.authors = data['items'][i]['volumeInfo']['authors'];
        return this.authors;
    }

}

//Ajax処理
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
            timeout: 10000,
            data: {
                'params': param[1]["value"]
            },
            beforeSend: function () {
                $('.loading').removeClass('hide');
            }
        }).done(function (data) {
            $('#book-img').empty();
            $('.loading').addClass('hide');
            // 通信成功時の処理
            var count = data['items'].length;
            var api = new Googlebooksapi(data);
            api.showBooks(count);

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
