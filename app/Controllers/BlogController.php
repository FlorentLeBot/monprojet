<?php

namespace App\Controllers;

use App\Models\BlogModel;

class BlogController extends Controller
{

    public function index()
    {
        $req = new BlogModel; 
        $articles = $req->all();
        return $this->view('front.blog.index', compact('articles'));

    }
    public function show(int $id){
        
        $req = new BlogModel;
        $article = $req->findById($id);
        return $this->view('front.blog.show', compact('article'));
    }
   
     
}