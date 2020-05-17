<?php

namespace App\Controller;

class PracticesController extends AppController{
    public function index(){

    }

    public function ajaxTest(){
        $this->autoRender=false;
        if($this->request->is("ajax")){
            $base_url = 'https://www.googleapis.com/books/v1/volumes?q=';
            echo "ok";
        }
    } 
}