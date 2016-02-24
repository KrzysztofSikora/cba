<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 19.02.16
 * Time: 13:44
 */

session_save_path('session/');
session_start();

include 'db.php';


$idOpis = $_GET['opis'];


$tabProd = $db->Prepare("SELECT * FROM `produkty` WHERE `idproduktu` = :opis");
$tabProd->bindParam(":opis", $idOpis, PDO::PARAM_STR);
$tabProd->Execute();
$tabProd = $tabProd ->fetch(PDO::FETCH_ASSOC);


$opis = $tabProd['opis'];

echo "$opis";




?>