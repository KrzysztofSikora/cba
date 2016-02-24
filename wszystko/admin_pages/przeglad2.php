<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 26.01.16
 * Time: 10:21
 */

session_save_path('session/');
session_start();

include 'db.php';

$produkty = "produkty";
$tabProd = $db->Prepare('SELECT * FROM :dukty');
$tabProd->bindParam(":dukty", $produkty, PDO::PARAM_STR);
$tabProd->Execute();
$tabProd = $tabProd ->fetch(PDO::FETCH_ASSOC);

echo "<table border='2px'><tr><td>ID</td><td>Kategoria</td><td>Ilość</td><td>Cena</td><td>Opis</td><td>Zdjęcie</td><td>Kup</td></tr>";
foreach($db->query('SELECT * FROM `produkty`') as $row) {

    $idProd = $row['idproduktu'];
    $kategoria = $row['kategoria'];
    $ilosc = $row['ilosc'];
    $cena = $row['cena'];
    $opis = $row['opis'];

    echo "<tr><td>$idProd</td><td>$kategoria</td><td>$ilosc</td><td>$cena</td><td>$opis</td>
<td><img src='/wszystko/wyswietl_product_image.php?index=$idProd' width='150px' height='150px' </td><td><a href='dodajDoKoszyka.php?addkoszyk=$idProd'>Dodaj do koszyka</a></td></tr>";
}

echo "</table>";


?>