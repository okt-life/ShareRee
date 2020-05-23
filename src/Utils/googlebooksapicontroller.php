<?php


class Googlebooksapi {


    public function __construct($params){
        $this->params = $params[];

        // 1ページあたりの取得件数
        $maxResults = 10;
        // ページ番号（1ページ目の情報を取得）
        $startIndex = 0;  //欲しいページ番号-1 で設定

        $base_url = 'https://www.googleapis.com/books/v1/volumes?q=';

                // 配列で設定した検索条件をURLに追加
        foreach ($params as $key => $value) {
            $base_url .= $key.':'.$value.'+';
        }
        // 末尾につく「+」をいったん削除
        $params_url = substr($base_url, 0, -1);

        // 件数情報を設定
        $url = $params_url.'&maxResults='.$maxResults.'&startIndex='.$startIndex;
        // 書籍情報を取得
        $json = file_get_contents($url);
        // デコード（objectに変換）
        $data = json_decode($json);
        // 全体の件数を取得
        $total_count = $data->totalItems;
        // 書籍情報を取得
        $books = $data->items;
        // 実際に取得した件数
        $get_count = count($books);

    }

    public function getDecodeData(){
        return $data;
    }

    public function getTotalCount(){
        return $total_count;
    }

    public function getCount(){
        return $get_count;
    }

    public function getBooksInfo(){
        return $books;
    }
}


?>