<?php

namespace App\Controllers;

use App\Models\BlogModel;

class BlogController extends Controller
{
    // méthode permettant l'affichage de tous les articles
    public function index()
    {
        $req = new BlogModel; 
        $articles = $req->all();
        return $this->view('front.blog.index', compact('articles'));
    }
    // méthode permettant l'affichage d'un article
    public function show(int $id){
        
        $req = new BlogModel;
        $article = $req->findById($id);
        return $this->view('front.blog.show', compact('article'));
    }
   
     
}