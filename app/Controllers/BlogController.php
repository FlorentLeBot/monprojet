<?php

namespace App\Controllers;

class BlogController{

    public function index(){
        echo "Je suis l'accueil";

    }
    public function showBlog(int $id){
        echo "Je suis le post " . $id;
    }
}