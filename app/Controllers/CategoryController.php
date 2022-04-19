<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends Controller
{
    public function category(int $id)
    {
        $category = (new CategoryModel($this->db))->findById($id);
        return $this->view('front.game.category', compact('category'));
    }
    // public function categories()
    // {
    //     $categories = (new CategoryModel($this->db))->allCategories(); 
    //     var_dump($categories); die;
    //     return $this->view('front.game.index', compact('categories'));
    // }
    
}