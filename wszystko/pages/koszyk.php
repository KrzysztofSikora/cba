<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 04.02.16
 * Time: 18:54
 */
echo "Koszyk";

session_save_path('session/');
session_start();

include 'db.php';

$koszyk = 'koszyk';


$idklienta = $_SESSION['user'];

echo "<table>";
echo "<tr><td>Idzamowienia</td><td>Idproduktu</td><td>Ilość</td><td>Status</td></tr>";
foreach($db->query("SELECT * FROM `koszyk` WHERE `idklienta` = '$idklienta'") as $tabKosz) {
    $idzamowienia = $tabKosz['idzamowienia'];
    $idproduktu = $tabKosz['idproduktu'];
    $idklienta = $_SESSION['user'];
    $ilosc = $tabKosz['ilosc'];
    $status = $tabKosz['status'];
    echo "<tr><td>$idzamowienia</td><td>$idproduktu</td><td>$ilosc</td><td>$status</td></tr>";
}

echo"</table>";
echo $idklienta;
if(isset($_POST['order'])) {
    echo "zamawiam";

    header("Location: zalogowany.php?page=finalizacja");
    exit;
}


?>
<form action="zalogowany.php?page=koszyk" method="post">
    <input type='submit' name='order' value='Zamów'/>
</form>
