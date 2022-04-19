<?php

namespace App\Controllers;

use App\Models\TagModel;

class TagController extends Controller
{
    // affichage des articles par id
    public function tag(int $id)
    {
        $tag = (new TagModel($this->db))->findById($id);

        return $this->view('front.blog.tag', compact('tag'));
    }
}
