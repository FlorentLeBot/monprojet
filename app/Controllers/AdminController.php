<?php

namespace App\Controllers;


use Database\DBConnection;

class AdminController extends Controller{
    public function index()
    {
        return $this->view('dashboard.index');
    }
}