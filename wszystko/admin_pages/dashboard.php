<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 20.01.16
 * Time: 15:32
 */


session_save_path('session/');
session_start();

include 'db.php';



echo "Zalogowany <br>";

$id = $_SESSION['user'];
$tabLog = $db->Prepare("SELECT * FROM  `uzytkownik` WHERE  `id` LIKE :id");
$tabLog->bindParam(":id", $id, PDO::PARAM_STR);
$tabLog->Execute();
$tabLog = $tabLog->fetch(PDO::FETCH_ASSOC);
$kod = $tabLog['kod'];

if($kod === 'active') {

    $imie = $tabLog['imie'];
    $nazwisko = $tabLog['nazwisko'];

    echo "Imie: $imie Nazwisko: $nazwisko <br>";
} else {
    echo "Konto nie aktywowane, sprawdź pocztę.";
}
if($id == 1) {
    include 'admin.php';

} else {
    //include 'uzytkownik.php';
}


?>