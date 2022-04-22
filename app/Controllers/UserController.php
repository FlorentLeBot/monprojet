<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Validation\Validator;

/* Sommaire des méthodes
- register
- login
- loginPost
- logout
- comment
*/

class UserController extends Controller
{
    public function register(): void
    {
        $this->view('auth.register');
    }
    // enregistrement d'un nouvel utilisateur et redirection vers la page d'accueil
    public function registerPost(): void
    {
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $newUser = (new UserModel($this->db))->registerUser($_POST['username'], $_POST['password'], $_POST['email']);
        header('Location: /monprojet/');
    }

    public function login() : void
    {
        $this->view('auth.login');
    }

    public function loginPost() : void
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            "username" => ['required', 'min:3'],
            'password' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /monprojet/login');
            exit;
        }

        $user = (new UserModel($this->db))->getByUsername($_POST['username']);

        if (password_verify($_POST['password'], $user->password) && $user->role === 1) {
            $_SESSION['auth'] = (int) $user->role;
            $_SESSION['id'] = (int) $user->id;
            $_SESSION['username'] = $user->username;

            header('Location: /monprojet/admin/articles?success=true');
        } elseif (password_verify($_POST['password'], $user->password) && $user->role === 0) {
            $_SESSION['id'] = (int) $user->id;
            $_SESSION['username'] = $user->username;
            header('Location: /monprojet/articles?success=true');
        } else {
            var_dump('else');
            header('Location: /monprojet/login');
        }
    }
    public function logout() : void
    {
        session_destroy();
        header('Location: /monprojet/');
    }

    // les commentaires

    public function comment() : void
    {
        $this->view('auth.comment');
    }

    public function postComment()
    {
        $comment = (new UserModel($this->db))->registerComment($_POST['content']);
        
    }
}
