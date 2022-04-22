<?php

namespace App\Controllers;

use App\Models\ContactModel;

class ContactController extends Controller
{
    public function contact()
    {
        return $this->view('front.contact.contact');
    }
    function postMail()
    {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $postMail = (new ContactModel($this->db))->postMail($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['content']);
            return header('Location: /monprojet/contact');
        }
    }
   
}
