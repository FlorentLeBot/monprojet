<?php

namespace App\Controllers\Admin;

use App\Models\BlogModel;
use App\Controllers\Controller;
use App\Models\ContactModel;
use App\Models\GameModel;

class AdminController extends Controller
{
    // méthode affichage de la page index dans le dashboard administration du blog
    public function index()
    {
        // nouvelle instance de BlogModel affichage de tous les articles
        $articles = (new BlogModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.index', compact('articles'));
    }
    // méthode affichage de la page game administration des fiches pour les jeux de société
    public function game()
    {
        $games = (new GameModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.game', compact('games'));
    }
    // méthode affichage de la page contact récupération du formulaire de contact
    public function contact()
    {
        $contact = (new ContactModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.contact', compact('contact'));
    }
    // méthode permettant d'éditer un article du blog par id
    public function edit(int $id)
    {
        $article = (new BlogModel($this->db))->findById($id);
        $res = $this->viewAdmin('admin.dashboard.edit', compact('article'));
        return $res;
    }
    // méthode permettant la mise à jour d'un article ou d'une fiche jeu de société
    public function update(int $id)
    {
        
        // upload image
        // récupération des valeurs de $_FILES
        if (isset($_FILES['img'])) {
            $name = $_FILES['img']['name'];
            $tmpName = $_FILES['img']['tmp_name'];
            $error = $_FILES['img']['error'];
            $size = $_FILES['img']['size'];
        }
        // séparation du nom de l'image et de son extension 
        $tabExtension = explode('.', $name);
        // transformation de l'extension en minuscule
        $extension = strtolower(end($tabExtension));
        // extensions accepté
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
        // taille maximum d'une image
        $maxSize = 400000;
        // si le nom de l'extension, la taille maximum et le code d'erreur est égal à 0 (aucune erreur de téléchargement)...
        if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
            // créer un nom unique ...
            $uniqueName = uniqid('', true);
            // rajouter le point et le nom de l'extension 
            $file = $uniqueName . "." . $extension;
            // télécharger l'image
            move_uploaded_file($tmpName, './upload/' . $file);
         
        }
        
        $article = new BlogModel($this->db);
        $res1 = $article->update($id,$_POST);
        //$res2 = $article->upload($id,$_FILES);
        
        

        if ($res1) {
            return header('Location: /admin/articles');
        }
    }
// méthode permettant de supprimer 
    public function delete(int $id)
    {
        $article = new BlogModel($this->db);
        $res = $article->delete($id);

        if ($res) {
            return header("Location: /admin/articles");
        }
    }
    
        
    
}
