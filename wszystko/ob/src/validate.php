<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 26.02.16
 * Time: 20:00
 */

include 'Users.php';

$login = $_POST['login'];
$passwordl = $_POST['passwordl'];

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$login2 = $_POST['login2'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$val = new Users();
if(isset($_POST['reg'])) {
   echo $val->validate($name, $surname, $email, $login2, $password, $password2);
}
//if (preg_match('/^[0-9A-Za-z]+$/', $login)) {
//    echo("Login ok <br>");
//} else {
//    echo("Login error <br>");
//}
//
//if (preg_match('/^[0-9A-Za-z]+$/', $passwordl)) {
//    echo("Haslo log ok <br>");
//} else {
//    echo("Haslo log error <br>");
//}
//
//
//if (preg_match('/^[A-Z][a-z]+$/', $name)) {
//    echo("Imie ok <br>");
//} else {
//    echo("Imie error <br>");
//}
//
//if (preg_match('/^[A-Z][a-z]+$/', $surname)) {
//    echo("Nazwisko ok <br>");
//} else {
//    echo("Nazwisko error <br>");
//}
//
//if (preg_match('/^[A-Za-z]+@[A-Za-z]+.[A-Za-z]+$/', $email)) {
//    echo("Email ok <br>");
//} else {
//    echo("Email error <br>");
//}
//
//if (preg_match('/^[0-9A-Za-z]+$/', $login2)) {
//    echo("Login ok <br>");
//} else {
//    echo("Login error <br>");
//}
//
//if($password === $password2) {
//    if (preg_match('/^[0-9A-Za-z]{6,}$/', $password)) {
//        echo("Haslo ok <br>");
//    } else {
//        echo("Haslo error <br>");
//    }
//} else {
//    echo ("Hasla sie roznia <br>");
//}

?>

Zaloguj się.
<form action="validate.php" method="post">
    <input type="text" name="login" placeholder="Login" /><br><br>
    <input type="text" name="passwordl" placeholder="Hasło" /><br><br>
    <input type="submit" name="log" value="Zaloguj"/>
</form>
<br>
Jeśli nie masz konta. Zarejestruj się.
<form action="validate.php" method="post">
    <input type="text" name="name" placeholder="Imie" /><br><br>
    <input type="text" name="surname" placeholder="Nazwisko" /><br><br>
    <input type="text" name="email" placeholder="E-mail" /><br><br>
    <input type="text" name="login2" placeholder="Login" /><br><br>
    <input type="password" name="password" placeholder="Hasło" /><br><br>
    <input type="password" name="password2" placeholder="Powtórz hasło" /><br><br>
    <input type="submit" name="reg" value="Rejestruj"/>
</form>

