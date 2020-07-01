<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Utils\GoogleBookApiUtility;
use Cake\ORM\TableRegistry;
use Exception;

class BooksController extends AppController
{
    public function initialize()
    {
        $this->name = 'books';
    }
    public function index()
    {
    }
    public function googlebooks()
    {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            $params = array(
                'q' => $data['params'],
                'isbn' => ""
            );
            $info = new GoogleBookApiUtility($params);
            //$totalCount = $info->getTotalCount();
            $get_count = $info->getCount();
            $books = $info->insertInfo();

            //book_infoテーブルに書き込み
            /*
            $booksTable = TableRegistry::get('BookInfos');
            for ($i = 0; $i < $get_count; $i++) {
                $book = $booksTable->newEntity();
                $book->title = $books[$i]['title'];
                $book->authors = $books[$i]['authors'];
                //$book->isbn_10 = $books[0][$i]['isbn'][0][1]->identifier;
                //$book->isbn_13 = $books[0][$i]['isbn'][0][0]->identifier;
                $book->image_links = $books[$i]['thumbnail'];
                $book->description = $books[$i]['description'];
                $book->published_date = $books[$i]['publishDate'];
                $book->page_count = $books[$i]['pageCount'];
                $booksTable->save($book);
            }
            */
            $this->response->body(json_encode($books, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        }
    }
}
