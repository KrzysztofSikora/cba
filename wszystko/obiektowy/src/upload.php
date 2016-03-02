<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 01.03.16
 * Time: 19:29
 */

$uzytkownik = "krzysztofcba";         //
$haslo = "bazacba12";                // Rzecz jasna wszystkie te dane zależą od naszej konkretnej bazy!
$db_name = "krzysztofsikora24_pl";          //
$adres = "krzysztofsikora24.pl";         //

$link = mysql_connect( $adres, $uzytkownik, $haslo);
mysql_select_db($db_name);

$fhandle = fopen($_FILES['zdjecie']['tmp_name'], "r");
$content = base64_encode(fread($fhandle, $_FILES['zdjecie']['size']));
fclose($fhandle);

$zapytanie = mysql_query("INSERT INTO zdjecia (zdjecie) VALUES (\"".$content."\")");

$adres = "http://krzysztofsikora24.pl/wszystko/obiektowy/src/showimage.php?id=".mysql_insert_id();
//        echo "Twoje zdjęcie otrzymało adres: <br/>".$adres;
        echo "<img src=\"".$adres."\"/>";

?>
