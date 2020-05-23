<?php

namespace App\Controller;
ini_set('display_errors',1);
class BooksController extends AppController{
   
    public function index(){

    }

    public function ajaxTest(){
        
        $this->autoRender=false;
        if($this->request->is("ajax")){
            $data = $this->request->getData();
            $base_url = 'https://www.googleapis.com/books/v1/volumes?q='.$data["params"];
            $json = file_get_contents($base_url); 
            $this->response->body($json);
            $this->log($data);
        }else{
            echo "データ取得失敗";
        }
    } 
}