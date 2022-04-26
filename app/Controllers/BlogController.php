<?php

namespace App\Controllers;

use App\Models\Model;
use App\Models\BlogModel;
use App\Models\CommentModel;

class BlogController extends Controller
{
    // affichage de tous les articles
    public function index()
    {
        $req = new BlogModel; 
        $articles = $req->all();   
        return $this->view('front.blog.index', compact('articles'));
    }
    // affichage d'un article
    public function show(int $id){
        
        $req = new BlogModel;
        $request = new CommentModel;
        $article = $req->findById($id);     
        return $this->view('front.blog.show', compact('article'));
    }
    public function pagination($id){
        $req = new Model;
        $articles = $req->pagination($id);     
        return $this->view('front.blog.show', compact('page'));
    }
    
    
   
     
}