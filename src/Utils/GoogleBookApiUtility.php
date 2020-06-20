<?php
//require_once('src/Controller/BooksController.php');
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

    //インスタンス作成時にisbnの情報を配列として挿入する
    public function __construct($params){
        $this->params = $params;
    }

    //URLの作成
    public function createUrl(){
        $url = $this->base_url;
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

    //書籍情報の作成
    public function decodeInfo(){
        // 書籍情報を取得
        $json = file_get_contents($this->createUrl());
        //デコード（objectに変換）
        $data = json_decode($json);

        return $data;
    }

    // isbnに対する検索結果の全体の件数を取得するメソッド
    public function getTotalCount(){
        $totalCount = $this->decodeInfo()->totalItems;
        return $totalCount;
    }

   // 書籍情報を取得するメソッド
    public function booksInfo(){
        $books = $this->decodeInfo()->items;
        return $books;
    }

    //必要な情報だけを取得するメソッド
    public function specificInfo($info){
        $title = $info->volumeInfo->title;
        //三項演算子
        $authors = isset($info->volumeInfo->authors)?implode(",",$info->volumeInfo->authors):"著者名未登録";
        $thumbnail = $info->volumeInfo->imageLinks->thumbnail;
        $isbn[] = $info->volumeInfo->industryIdentifiers;
        $booksinfo = array(
            'title' => $title,
            'authors' => $authors,
            'thumbnail' =>$thumbnail,
            'isbn' => $isbn,

        );
        return $booksinfo;
    }

    //コントローラーに渡すデータの整理をするメソッド
    public function insertInfo(){
        $result =[];
        $datas = $this->booksInfo();
        foreach($datas as $data){
            $result[] = $this->specificInfo($data);
        }
        return $result;
    }

    //isbnに対する実際に取得した件数を取得する関数
    public function getCount(){
        $get_count = count($this->booksInfo());
        return $get_count;
    }
}
