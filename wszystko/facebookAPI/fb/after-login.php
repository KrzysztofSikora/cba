<?php
session_start();
$loader = include "vendor/autoload.php";
$fb = new \LukaszSocha\DemoFB\FacebookApi(1776971415858954, 'f2ee09a3d2c5ca103560eb4b2173f1b9');
$fb->login();