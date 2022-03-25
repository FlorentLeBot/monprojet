<?php /*

namespace App\Controllers;


use Database\DBConnection;

class GameController extends Controller{

    

    public function index(){

        $statement = $this->db->getPDO()->query("SELECT * FROM articles ORDER BY created_at DESC");
        $articles = $statement->fetchAll();
        return $this->view('blog.index', compact('articles'));

    }
    public function show(int $id){
        
        
        return $this->view('blog.show', compact('id'));
    }
    
    
} 