<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 17.02.16
 * Time: 13:40
 */
//// odczyt z pliku
//$nazwa_pliku = "dane.txt";
//$plik = fopen($nazwa_pliku, 'r');
//$dane = fread($plik, filesize($nazwa_pliku));
//fclose($plik);
//echo(nl2br($dane));

//zapis
$nazwa_pliku = "dane.txt";
$do_zapisania = "WWW.uw-team.org";
$plik = fopen($nazwa_pliku, 'a');
fputs($plik, $do_zapisania);
fclose($plik);
//echo(nl2br($dane));