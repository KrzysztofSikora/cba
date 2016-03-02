<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 01.03.16
 * Time: 19:36
 */

header("Content-type: image/jpg;");

$uzytkownik = "krzysztofcba";         //
$haslo = "bazacba12";                // Rzecz jasna wszystkie te dane zależą od naszej konkretnej bazy!
$db_name = "krzysztofsikora24_pl";          //
$adres = "krzysztofsikora24.pl";         //        //

$link = mysql_connect( $adres, $uzytkownik, $haslo);
mysql_select_db($db);
$id = $_GET['id'];
$result = mysql_query("SELECT zdjecie FROM zdjecia WHERE id= '$id'");
if (mysql_num_rows($result) != 0)
{
    $row = mysql_fetch_assoc($result);
    echo base64_decode($row['zdjecie']);
    echo ($row['id']);
}

?>