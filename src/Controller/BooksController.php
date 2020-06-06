<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Utils\AppUtility;

class BooksController extends AppController
{

    public function index()
    {
        /* $this->setAction('test');  */
    }

    public function test()
    {
        $this->autoRender=false;
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            $results = AppUtility::add($data["params"]);
            $results = json_decode($results);
            $books = $results->items;
            $total_count = $results->totalItems;
            $get_count = count($books);
            foreach ($books as $book) {
                // サムネ画像
                $thumbnails[] = $book->volumeInfo->imageLinks->thumbnail;
            }
            $this->log($thumbnails);
            $this->response->body(json_encode($thumbnails));
        }
    }
}
