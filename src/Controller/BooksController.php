<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\BookInfo;
use App\Utils\GoogleBookApiUtility;
use Cake\ORM\TableRegistry;
use Exception;

class BooksController extends AppController
{
    public $paginate = [
        'limit' => 3 // 1ページに表示するデータ件数
    ];
    public function initialize()
    {
        $this->set('book', $this->paginate());
        $this->name = 'books';
    }
    public function index()
    {
    }
    public function googlebooks()
    {
        //$this->set('book', $this->paginate());
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            $params = array(
                'q' => $data['params'],
                'isbn' => ""
            );
            $booksTable = TableRegistry::get('BookInfos');
            //検索したワードがDBにあるか確認
            $search_num = $booksTable->find('all', ['conditions' => ['word' => $params['q']]])->count();
            //ない場合はAPIで検索した後にテーブルに入力
            if ($search_num == 0) {
                $info = new GoogleBookApiUtility($params);
                $totalCount = $info->getTotalCount();
                $get_count = $info->getCount();
                $books = $info->insertInfo();
                $this->log($books);
                array_push($books, $get_count);
                array_push($books, $totalCount);
                //book_infoテーブルに書き込み
                for ($i = 0; $i < $get_count; $i++) {
                    $book = $booksTable->newEntity();
                    $book->title = $books[$i]['title'];
                    $book->authors = $books[$i]['authors'];
                    $book->isbn_10 = $books[$i]['isbn_10'];
                    $book->isbn_13 = $books[$i]['isbn_13'];
                    $book->image_links = $books[$i]['thumbnail'];
                    $book->description = $books[$i]['description'];
                    $book->published_date = $books[$i]['publishDate'];
                    $book->page_count = $books[$i]['pageCount'];
                    $book->word = $params['q'];
                    $booksTable->save($book);
                }
                $this->response->body(json_encode($books, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            }else{
                //ある場合はDBから表示
                $books=$booksTable->find('all',['conditions'=>['word' => $params['q']]])->toArray();
                $books_cnt=$booksTable->find('all',['conditions'=>['word' => $params['q']]])->count();
                array_push($books,$books_cnt);
                $this->log($books_cnt);
                $this->response->body(json_encode($books, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            }



            
        }
    }
}
