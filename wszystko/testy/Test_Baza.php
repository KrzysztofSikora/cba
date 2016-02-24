<?php

/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 13.02.16
 * Time: 11:48
 */

class Test_Baza
{
    public $_nazwa;
    public $_parametr;
    public $_zawartosc;
    public $db;

    function __construct()
    {
        $this->db = new PDO("mysql:host=mysql.hostinger.pl;dbname=u108449187_2b","u108449187_2u","baza12");
    }


    function dodaj($nazwa, $parametr, $zawartosc){
        $this->_nazwa = $nazwa;
        $this->_parametr = $parametr;
        $this->_zawartosc = $zawartosc;

        $this -> db->Exec("INSERT INTO `test` VALUES ('NULL', '$this->_nazwa', '$this->_parametr', '$this->_zawartosc')");

    }


   function pokaz_obrazek() {
       $query = $this->db->query("SELECT * from product where productID = 9");
       header("Content-Type: image/jpg");
       $query = $query->fetch(PDO::FETCH_ASSOC);
       $sraka = $query['image'];
       echo "$sraka";
    }
}