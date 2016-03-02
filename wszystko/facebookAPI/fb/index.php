<?php
session_start();
$loader = include "vendor/autoload.php";
$fb = new \LukaszSocha\DemoFB\FacebookApi(1776971415858954, 'f2ee09a3d2c5ca103560eb4b2173f1b9');
$fb->setPermissions(array('email', 'public_profile'));
$fb->setCallback('http://krzysztofsikora24.pl/wszystko/facebookAPI/fb/after-login.php');

if ($fb->getAccessToken()) {
    // jeżeli zalogowany wyświetli danr
    $data = $fb->getUserData('me?fields=email, name, gender,id,first_name,last_name,link,locale,timezone,verified');
    print_r($data->getDecodedBody());
} else {
    // jeżeli niezalogowany
    echo '<a href="' . $fb->getLoginUrl() . '">Zaloguj</a>';
}