<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Validation\Validator;

class UserController extends Controller
{


    public function register()
    {
        return $this->view('auth.register');
    }
    // enregistrement d'un nouvel utilisateur et redirection vers la page d'accueil
    public function registerPost(){
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $newUser = (new UserModel($this->db))->registerUser($_POST['username'], $_POST['password'], $_POST['email']);
        return header('Location: /');
    }

    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            "username" => ['required', 'min:8'],
            'password' => ['required']
        ]);
        //var_dump($errors); die();
        if($errors){
            $_SESSION['errors'][] = $errors;
            header('Location: /login');
            exit;
        }

        $user = (new UserModel($this->db))->getByUsername($_POST['username']);
        var_dump($user->password); die();
        if (password_verify($_POST['password'], $user->password) && $user->role === 1) {
            $_SESSION['auth'] = (int) $user->role;
            return header('Location: /admin/articles?success=true');
        } elseif (password_verify($_POST['password'], $user->password) && $user->role === 0) {
            return header('Location: /articles?success=true');
        } else {
            return header('Location: /login');
        }
    }
    public function logout()
    {
        session_destroy();
        return header('Location: /');
    }

   
   
}