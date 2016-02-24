<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 08.02.16
 * Time: 12:17
 */

session_save_path('session/');
session_start();

include 'db.php';


$iduzytkownika = $_SESSION['user'];

echo "$iduzytkownika";

$tabAdres = $db->Prepare('SELECT * FROM `adres` WHERE `iduzytkownika` = :iduz');
$tabAdres->bindParam(":iduz", $iduzytkownika, PDO::PARAM_STR);
$tabAdres->Execute();
$tabAdres = $tabAdres->fetch(PDO::FETCH_ASSOC);

$idadresu = $tabAdres['idadresu'];


$kraj = $tabAdres['kraj'];
$miasto = $tabAdres['miasto'];
$kodpocztowy = $tabAdres['kodpocztowy'];
$uliczadom = $tabAdres['ulicadom'];
$telefon = $tabAdres['telefon'];

echo "<table border='2px'><tr><td>$kraj</td><tr><td>$miasto</td></tr><tr>
        <td>$kodpocztowy</td></tr><tr><td>$ulicadom</td></tr><tr><td>$telefon</td></tr></tr></table><br>";







if(isset($_POST['adresuj'])) {

    $kraj = $_POST['kraj'];
    $miasto = $_POST['miasto'];
    $kodpocztowy = $_POST['kodpocztowy'];
    $ulicadom = $_POST['ulicadom'];
    $telefon = $_POST['telefon'];

    $db->Exec("INSERT INTO `adres` VALUES ('NULL','$iduzytkownika','$kraj','$miasto','$kodpocztowy','$ulicadom','$telefon')");

}




?>

<form action="index.php?page=settings_adres" method="post">
    <input type="text" name="kraj" placeholder="Kraj" required /><br><br>
    <input type="text" name="miasto" placeholder="Miasto" required /><br><br>
    <input type="text" name="kodpocztowy" placeholder="Kod pocztowy" required /><br><br>
    <input type="text" name="ulicadom" placeholder="Ulica i numer domu/mieszkania" required /><br><br>
    <input type="tel" name="telefon" placeholder="Numer telefonu" required /><br><br>
    <input type="submit" name="adresuj" value="Dodaj"/>
</form>