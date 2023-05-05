<?php

class User
{
    public function getAllUsers()
    {
        $db = new mysqli('localhost', 'root', '', 'tddproject');

        if ($db->connect_error) {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }

        $result = $db->query('SELECT * FROM user');

        $users = [];
        while ($user = $result->fetch_assoc()) {
            $users[] = $user;
        }

        return $users;
    }
}
