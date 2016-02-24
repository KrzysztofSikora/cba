<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 17.02.16
 * Time: 15:36
 */
//setcookie('nick',base64_encode('unknow'),time()+60*60);
//echo(time());
echo('Twoj nick to: '.base64_decode($_COOKIE['nick']));

//base64_encode();
//base64_decode();