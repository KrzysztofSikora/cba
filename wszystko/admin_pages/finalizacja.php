<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 06.02.16
 * Time: 18:15
 */
echo "Finalizacja";


session_save_path('session/');
session_start();

include 'db.php';

$koszyk = 'koszyk';


$idklienta = $_SESSION['user'];

echo "<table border='2px'>";
echo "<tr><td>Idzamowienia</td><td>Idproduktu</td><td>Ilość</td>";
foreach($db->query("SELECT * FROM `koszyk` WHERE `idklienta` = '$idklienta'") as $tabKosz) {
    $idzamowienia = $tabKosz['idzamowienia'];
    $idproduktu = $tabKosz['idproduktu'];
    $idklienta = $_SESSION['user'];
    $ilosc = $tabKosz['ilosc'];

    echo "<tr><td>$idzamowienia</td><td>$idproduktu</td><td>$ilosc</td></tr>";
}

echo"</table>";

if(isset($_POST['typwysylki'])) {

    $typwysylki = $_POST['wysylka'];
    // wysylka getem rodzaju wysylki w do potwierdzenia

    header("Location: index.php?page=adres&typwysylki=$typwysylki");
    exit;
}

?>

<form action="index.php?page=finalizacja" method="post">
    <input type="radio" name="wysylka" value="poczta"/> Poczta Polska<br>
    <input type="radio" name="wysylka" value="kurier"/> Kurier<br>
    <input type="radio" name="wysylka" value="murzyn"/> Murzyn<br>
    <input type="radio" name="wysylka" value="odbior"/> Odbiór osobisty<br><br>
    <input type="submit" name="typwysylki" value="Wybierz"/>
</form>
