<?php

namespace App\Controllers;

// affichage de la page d'accueil
class WelcomeController extends Controller
{
    public function welcome()
    {
        return $this->view('welcome');
    }
}
