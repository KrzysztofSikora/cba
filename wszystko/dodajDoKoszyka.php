<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 04.02.16
 * Time: 16:55
 */

session_save_path('session/');
session_start();

include 'db.php';


$idklienta = $_SESSION['user'];
$ilosc = 1;



if(isset($_GET['addkoszyk'])) {

    $idproduktu = $_GET['addkoszyk'];
    echo "$idproduktu";
    echo "$idklienta";
    echo "$ilosc";
    $db->Exec("INSERT INTO `koszyk` VALUES ('null','$idproduktu', '$idklienta', '$ilosc', 'czeka', 'null')");

    header("Location: index.php?success=5");
    exit;

}

?>