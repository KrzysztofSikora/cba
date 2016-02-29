<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 26.02.16
 * Time: 16:39
 */
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

?>