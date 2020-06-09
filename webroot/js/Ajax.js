//GoogleBooksApiの処理に関するクラス
class Googlebooksapi{
    
    constructor(data){
        this.data=data;
        this.authors=data['items'][1]['volumeInfo']['authors'];
    }
    getImage(count){
        for(var i=0;i<count;i++){
            this.ImageLink=this.data['items'][i]['volumeInfo']['imageLinks']['thumbnail'];
            $('#book-img').append('<a href="#"><img src=' + this.ImageLink + '></a>');
        }
    }
    getTitle(count){
        this.title=data['items'][count]['volumeInfo']['title'];
        return this.title;
    }
    getdescription(count){
        this.description=data['items'][count]['volumeInfo']['description'];
        return this.description;
    }
    getPublisher(count){
        this.publisher=data['items'][count]['volumeInfo']['publisher'];
        return this.publisher;    
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
            var api=new Googlebooksapi(data);
            api.getImage(count);
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
