<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends Controller
{
    // méthode permettant l'affichage des jeux de société par id
    public function category(int $id)
    {
        $category = (new CategoryModel($this->db))->findById($id);

        return $this->view('front.game.category', compact('category'));
    }
}