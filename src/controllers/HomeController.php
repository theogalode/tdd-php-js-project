<?php
require 'src/model/User.php';

class HomeController
{
    public function index()
    {
        $user = new User();
        $data = $user->getAllUsers();

        require 'src/views/Home.php';
    }
}
