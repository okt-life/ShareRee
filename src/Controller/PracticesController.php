<?php

namespace App\Controller;
ini_set('display_errors',1);
class PracticesController extends AppController{
   
    public function index(){

    }

    public function ajaxTest(){
        
        $this->autoRender=false;
        if($this->request->is("ajax")){
            $data = $this->request->Data;
            $this->log("error");
            $base_url = 'https://www.googleapis.com/books/v1/volumes?q=';
            $json = file_get_contents($base_url); 
            $this->response->body($json);
        }else{
            echo "データ取得失敗";
        }
    } 
}