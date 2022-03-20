<?php

namespace App\Controllers;

use Article;
use Database\DBConnection;

class BlogController extends Controller{

    public function index(){
        return $this->view('blog.index');

    }
    public function showBlog(int $id){
        $db = new DBConnection('monprojet','localhost','root','');
        var_dump($db->getPDO());
        $req = $db->getPDO()->query("SELECT * FROM articles");
        var_dump($req);
        $articles = $req->fetchAll();
        var_dump($articles);
        return $this->view('blog.show', compact('id'));
    }
    
}