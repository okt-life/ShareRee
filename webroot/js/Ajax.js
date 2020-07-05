//GoogleBooksApiの処理に関するクラス
 class Googlebooksapi {

    constructor(data) {
        this.data = data;
    }
    showBooks(count) {
        for (var i = 0; i < count; i++) {
            //本のリンクを取得
            this.ImageLink = this.data[i]['image_links'];
            console.log(this.ImageLink);
            //本ごとに要素を作成
            $('#book-contents').append('<div class="book-card book-ele' + i + '" style="width：15rem;"></div>');
            //本の画像を表示させるaタグをbook-eleクラスの要素に追加
            $('.book-ele' + i).append('<img class="card-img-top " src=' + this.ImageLink + '></a>');
            $('.book-ele' + i).append('<div class="card-body' + i + '"></div>');
            $().append('<div class="card-body' + i + '"></div>');
            this.getTitle(i);
            this.getdescription(i);
            this.getAuthors(i);
        }
    }
    getTitle(i) {
        this.title = this.data[i]['title'];
        $('.card-body' + i).append('<h5 class=" card-title ">' + this.title + '</h5>');
    }
    getdescription(i) {
        this.description = this.data[i]['description'];
        $('.card-body' + i).append('<h6 class=" card-subtitle text-muted">' + this.description + '</h6>');
    }
    /*
    getPublisher(i) {
        this.publisher = this.data[i]['publisher'];
        $('.card-body' + i).append('<p class=" card-text ">' + this.publisher + '</p>');
    }
    */
    getAuthors(i) {
        this.authors = this.data[i]['authors'];
        $('.card-body' + i).append('<p class=" card-text ">' + this.authors + '</p>');
    }

}
//Ajax処理
$(function () {
    $(".submit").on('click', function () {
        $('#book-contents').empty();
        var form = $(this).parents("Form");
        
        var param = form.serializeArray();
        console.log(param);
        var base_url = "/ShareRee/books/googlebooks";
        $.ajax({
            url: base_url, //送り先のコントローラーのURL
            type: "post", //post通信
            dataType:'json',
            timeout: 10000,
            data: {
                'params': param[1]["value"]
            },
            beforeSend: function () {
                $('.loading').removeClass('hide');
            }
        }).done(function (data) {
            console.log(data);
            $('.loading').addClass('hide');
            //console.log(data[0]['image_links']);
            var api=new Googlebooksapi(data);
            api.showBooks(data[data.length-1]);
            

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
