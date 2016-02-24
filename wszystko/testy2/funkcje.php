<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 17.02.16
 * Time: 13:17
 */

function ocena($jaka=5) {
   if($jaka<=2) {
       echo("Slabo<br>");
   } else if ($jaka<=3) {
       echo ("Srednio<br>");
   } else {
       echo("Super<br>");
   }
}

ocena(1);
ocena();
ocena();
ocena(3);

function poleProst($a, $b) {
    return $a * $b;
}

echo ('Pole prostokata o bokach 5x3 = '. poleProst(5,3));


function parzysta($liczba){
    if($liczba%2==0) return true;
    else return false;
}


$zmienna = 12;



echo "<br>";


if (parzysta($zmienna)){
    echo("Parzysta");
} else {
    echo("Nieparzysta");
}