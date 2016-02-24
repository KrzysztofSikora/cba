<?php

/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 13.02.16
 * Time: 11:48
 */
class Test
{
    public $wartosc;


    function funkcja1(){

    }
    function funkcja2(){

    }
    function instancja1(){
        echo "To jest treść funkcji";
    }
    function instancja2(){
        echo "To jest treść funkcji instancja 2";
    }

    function pokaz_wartosc() {
        return $this -> wartosc;
    }
}