<?php

/**
 * Created by PhpStorm.
 * User: Emre
 * Date: 6.5.2017
 * Time: 10:56
 */
class User
{
 private $id;
 private $firstname;
 private $lastname;
 private $email;
 private $password;


    function __construct($id = NULL, $firstname = NULL, $lastname = NULL, $email = NULL, $password = NULL)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
    }

    public function getİd()
    {
        return $this->id;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}