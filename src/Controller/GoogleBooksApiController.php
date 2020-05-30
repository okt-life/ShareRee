<?php
namespace App\Controller;

use App\Utils\GoogleBookApiUtility;

/**
 * Users Controller
 */
class UsersController extends AppController
{

    public function index()
    {
        if($_POST[]){
            $isbn = $_POST['isbn'];
            // 検索条件を配列にする
            $params = array(
                'isbn' => $isbn,
            );

            $booksinfo = new GoogleBookApiUtility($params);
        }
        $books = $this->Books->find('all');
        $this->set(compact('books'));
    }
}