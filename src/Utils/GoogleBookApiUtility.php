<?php
namespace App\Utils;

/**
 * AppUtility.
 */
class GoogleBookApiUtility
{
    // APIの基本になるURL
    protected $base_url = 'https://www.googleapis.com/books/v1/volumes?q=';
    protected $maxResults = 10;   // 1ページあたりの取得件数
    protected $startIndex = 0;    // ページ番号（1ページ目の情報を取得）欲しいページ番号-1 で設定
    //private $params = [];

    // public function __construct($params){
    //     $url = $this->base_url;
    //     // 配列で設定した検索条件をURLに追加
    //     foreach ($this->params as $key => $value) {
    //         $url .= $key.':'.$value.'+';
    //     }

    //     // 末尾につく「+」をいったん削除
    //     $params_url = substr($url, 0, -1);
    //     // 件数情報を設定
    //     $url = $params_url.'&maxResults='.$maxResults.'&startIndex='.$startIndex;
    //     // 書籍情報を取得
    //     $json = file_get_contents($url);
    //     // デコード（objectに変換）
    //     $data = json_decode($json);
    //     // 全体の件数を取得
    //     $total_count = $data->totalItems;
    //     // 書籍情報を取得
    //     $books = $data->items;
    //     // 実際に取得した件数
    //     $get_count = count($books);
    // }

    public function createUrl($params){
        // 配列で設定した検索条件をURLに追加
        foreach ($this->params as $key => $value) {
            $url .= $key.':'.$value.'+';
        }
        //末尾につく「+」をいったん削除
        $params_url = substr($url, 0, -1);
        // 件数情報を設定
        $url = $params_url.'&maxResults='.$this->maxResults.'&startIndex='.$this->startIndex;
        return $url;
    }

    public function decodeInfo(){
        // 書籍情報を取得
        $json = file_get_contents($this->createUrl($params));
        //デコード（objectに変換）
        $data = json_decode($json);

        return $data;
    }

    public function getTotalCount(){
        $totalCount = $this->decodeInfo()->totalItems;
        return $totalCount;
    }

    public function booksInfo(){
        $books = $this->decodeInfo()->items;
        return $books;
    }

    public function getCount(){
        $get_count = count($this->booksInfo());
        return $get_count;
    }
}