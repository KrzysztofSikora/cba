<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 07.02.16
 * Time: 13:25
 */

session_save_path('session/');
session_start();

include 'db.php';

echo "Sprawdzam adres wysyłki";

$iduzytkownika = $_SESSION['user'];

echo "$iduzytkownika";

$tabAdres = $db->Prepare('SELECT * FROM `adres` WHERE `iduzytkownika` = :iduz');
$tabAdres->bindParam(":iduz", $iduzytkownika, PDO::PARAM_STR);
$tabAdres->Execute();
$tabAdres = $tabAdres->fetch(PDO::FETCH_ASSOC);

$idadresu = $tabAdres['idadresu'];

if(isset($idadresu)) {

    $typwysylki = $_GET['typwysylki'];

    $db->query("UPDATE `koszyk` SET `wysylka` = '$typwysylki' WHERE `idklienta` = $iduzytkownika");


    echo "Adres jest w bazie.";
    header("Location: index.php?page=potwierdz");
    exit;
} else {
    echo "Nie ma adresu w bazie. Zanim dokończysz zamówienie dodaj swój adres w ustawieniach.";
}

echo "$idadresu";


?>

