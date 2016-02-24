<?php

/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 13.02.16
 * Time: 18:30
 */
class Obraz
{
    public $query;
    public $db;

    function __construct()
    {
        $this->db = new PDO("mysql:host=mysql.hostinger.pl;dbname=u108449187_2b","u108449187_2u","baza12");
    }


    function wyswietl() {
    $query = $this-> db->query("SELECT image from product where productID = 9");
  //  header("Content-Type: image/jpg");
    $query = $query->fetch(PDO::FETCH_ASSOC);
    $sraka = $query['image'];
    echo "$sraka";
    }
}