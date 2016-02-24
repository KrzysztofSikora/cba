<?php

/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 13.02.16
 * Time: 13:34
 */
class User
{
    public $userID;
    public $name;
    public $surname;
    public $email;
    public $login;
    public $password;
    public $code;
    public $registryDate; //echo date('d-m-Y H:i:s', time()+60*60);
    public $activationDate;
    public $db;

    function __construct()
    {
        $this->db = new PDO("mysql:host=mysql.hostinger.pl;dbname=u108449187_2b","u108449187_2u","baza12");
    }

    function wypiszWszystko() {

    }
}