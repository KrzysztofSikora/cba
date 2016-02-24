<?php

/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 13.02.16
 * Time: 14:41
 */
class Address
{

    public $addressID;
    public $userID;
    public $country;
    public $city;
    public $postalCode;
    public $street;
    public $telephone;

    function __construct()
    {
        $this->db = new PDO("mysql:host=mysql.hostinger.pl;dbname=u108449187_2b","u108449187_2u","baza12");
    }
}