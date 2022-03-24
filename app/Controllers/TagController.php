<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\TagModel;

class TagController extends Controller
{
    public function tag(int $id){
        $tag = (new TagModel($this->db))->findById($id);  
       
        return $this->view('blog.tag', compact('tag'));
    }
}
