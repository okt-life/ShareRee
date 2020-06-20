<?php
namespace App\Controller;
use App\Controller\AppController;
use App\Utils\GoogleBookApiUtility;

class BooksController extends AppController
{
    public function index()
    {
        //フォームから値を受け取る場合
        //$if(isset($_POST['isbn'])){
            // $params = array(
            //     'isbn' => $_POST['isbn'],
            // );

            //今回はフォームがないため、直接値を入力
            $params = array(
                'q' => "冨田",
                'isbn' => "",
            );
            //インスタンスを作成
            $info = new GoogleBookApiUtility($params);
            // isbnに対する検索結果の全体の件数を取得
            $totalCount = $info->getTotalCount();
            //isbnに対する実際に取得した件数
            $get_count = $info->getCount();
            // 書籍情報を取得
            $books[] = $info->insertInfo();
       // }

        //index.ctpに値を渡す
        $this->set('totalCount',$totalCount);
        $this->set('get_count',$get_count);
        $this->set('books', $books[0]);

    }
}
