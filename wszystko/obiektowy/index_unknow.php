<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 26.02.16
 * Time: 16:39
 */

// dodaje
session_save_path('session/');
session_start();
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

echo $_SESSION['ip'];

// dodaje
include 'src/Users.php';

echo "index_unknow.php <br>";

$uzytkownik = new Users();

echo "Metoda wypisz(): <br>";
echo $uzytkownik->write();
$uzytkownik->writeAll();

// logowanie
$uzytkownik->writeForm();
if(isset($_POST['log'])) {
    echo $uzytkownik->login($_POST['login'], $_POST['password']);
}

if(isset($_POST['reg'])) {
    $uzytkownik->registry($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['login'], $_POST['password'], $_POST['password2']);
}

$uzytkownik->userActivate($_GET['activate']);


?>
