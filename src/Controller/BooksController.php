<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Utils\AppUtility;

class BooksController extends AppController
{

    public function index()
    {
    }

    public function test()
    {
        $this->autoRender = false; //自動レンダリングをオフ
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            $results = AppUtility::add($data["params"]);
            $results = json_decode($results);
            $books = $results->items;
            $thumbnail = [];
            $total_count = $results->totalItems;
            $get_count = count($books);
            foreach ($books as $book) {
                // サムネ画像
                $thumbnail[] = $book->volumeInfo->imageLinks->thumbnail;
                $this->log($thumbnail);
            }
            $this->log($get_count);
            $this->response->body(json_encode($thumbnail));
        }
    }
}
