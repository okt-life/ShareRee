<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utils\GoogleBookApiUtility;

class BooksController extends AppController
{
    //public $booksinfo;
    public function index()
    {
        //if(isset($_POST['isbn'])){
           // $isbn = $_POST['isbn'];
            // 検索条件を配列にする//　5/26ここに値を直接入れてみる
            $params = array(
                'isbn' => '9784844377498',
            );
           // $params[] = '9784844377498';

            $info = new GoogleBookApiUtility($params);
            $totalcount = $info->getTotalCount();
            $getcount = $info->getCount();
            $bookinfo = $info->booksInfo();
        // }
        //$books = $this->Books->find('all');
        //$this->set(compact('books'));
        $this->set(compact('totalcount'));
        $this->set(compact('getcount'));
        $this->set(compact('bookinfo'));

    }
}
