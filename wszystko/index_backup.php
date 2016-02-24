<html>
<head> <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Zalogowanie</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!--jQuery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>




</head>
<body>













<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 13.01.16
 * Time: 22:17
 */

session_save_path('session/');
session_start();


if(isset($_SESSION['user'])) {

    if($_SESSION['user'] == 1) {
        include 'administrator.php'; // jesli jesteśmy zalogowani jako administator
    } else {
        //include 'zalogowany.php';
       header("Location: zalogowany.php"); // jeśli jesteśmy zalogowani jako klient

    }


}
else {
echo '<div class="col-md-4"> col-md-4';    include 'logowanie.php'; echo '</div>'; // jeśli nie
echo '<div class="col-md-8"> col-md-8';    include 'przeglad.php';echo '</div>'; // produkty dla niezalogowanego uzytkownika
}



if(isset($_GET['success'])) {
    switch($_GET['success']) {
        case 0:
            echo "Rejestracja potwierdzona.";
            break;

        case 1:
            echo "Pomyślnie zalogowano.";
            break;
        case 2:
            echo "Pomyślnie wylogowano.";
            break;
        case 3:
            echo "Rejestracja dokonana proszę sprawdzić pocztę.";
            break;
        case 4:
            echo "Dodano produkt pomyslnie";
            break;
        case 5;
            echo "Dodano do koszyka";
            break;
        case 6;
            echo "Zamówienie złożone. Sprawdź pocztę i obserwuj status zamówienia";
            break;
    }



}



if(isset($_GET['error'])) {
    switch($_GET['error']) {
        case 0:
            echo "Brak użytkownika o podanym kodzie aktywacyjnym.";
            break;
        case 1:
            echo "Hasła się różnią.";
            break;
        case 2:
            echo "Login zajęty.";
            break;
        case 3:
            echo "E-mail zajęty.";
            break;
        case 4:
            echo "Błędne hasło";
            break;
        case 5:
            echo "Nie wypełniono wszystkich pól logowania.";
            break;
        case 6:
            echo "Nie wypełniono wszystkich pół rejestracji.";
            break;
        case 7:
            echo "Błąd wypełnienia ankiety dodającej produkty";
            break;

    }


}



?>



</body>

</html>
