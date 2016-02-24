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

foreach($db->query('SELECT * FROM `produkty`') as $row) {

    $idProd = $row['idproduktu'];
    $kategoria = $row['kategoria'];
    $ilosc = $row['ilosc'];
    $cena = $row['cena'];
    $opis = $row['opis'];

    echo <<<END

    <div style="float: left; padding: 6%">
    <img src='/wszystko/wyswietl_product_image.php?index=$idProd' width='200px' height='200px' style="margin-bottom: 4%"> <br>
        <a href='zalogowany.php?page=opis&opis=$idProd'>Nazwa</a><br>
        Id produktu: $idProd <br>
        Kategoria: $kategoria <br>
        Dostępna ilość: $ilosc <br>
        Cena: $cena zł <br>
        <br>
        <br>
    </div>



END;
}
?>