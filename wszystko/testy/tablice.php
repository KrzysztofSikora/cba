<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 18.02.16
 * Time: 16:33
 */

$imie = 'Adam';
$tablica = array('Adam', 'Jakub', 'Olaf', 123);

print_r($tablica);
echo('Moje imie to: ' .$tablica[1]);
echo "<br>";
$osoba = array('imie'=>'Jakub',
                'nick'=>'Unknow',
                'zarabia'=>99999
    );

print_r($osoba);
echo($osoba['imie']. ' zarabia ' .$osoba['zarabia']. 'zl');

echo "<br>";

$zrzutka = array('Marian'=>5, 'Stefan'=>3, 'Franek'=>7);
print_r($zrzutka);
echo "<br>";
echo('elementow: ' .count($zrzutka));
echo "<br>";
print_r(array_values($zrzutka));
echo "<br>";
print_r(array_keys($zrzutka));
echo "<br>";

$kto = implode(',',array_keys($zrzutka));
$razem = array_sum(array_values($zrzutka));
echo($kto. ' dali razem '. $razem. 'zl');
echo "<br>";


$liczby = range(1,49);
print_r($liczby);
$wylosowane = array_rand($liczby,6);
echo "<br>";
print_r($wylosowane);
echo "<br>";

echo ('Wylosowane liczby to: '.implode(',', $wylosowane));
echo "<br>";

$text = 'ala,ola,ela';
$tablicaDruga = explode(',',$text);
//shuffle($tablicaDruga);
//array_push($tablicaDruga, 'stefan');
$tablicaDruga[] = 'stefan';
print_r($tablicaDruga);
echo "<br>";

$tablicaTrzecia = array(1,2,3);
print_r($tablicaTrzecia);
$tablicaTrzecia[] = array(4,5,6);
echo "<br>";
print_r($tablicaTrzecia);
echo "<br>";
echo($tablicaTrzecia[3][1]);