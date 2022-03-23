<?php

namespace App\Controllers;

use App\Models\BlogModel;

class BlogController extends Controller
{

    public function index()
    {
        $req = new BlogModel; 
        $articles = $req->articles();
        return $this->view('blog.index', compact('articles'));

    }
    public function show(int $id){
        
        $req = new BlogModel;
        $article = $req->article($id);
        return $this->view('blog.show', compact('article'));
    }
     
}