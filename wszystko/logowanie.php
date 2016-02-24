<html>
<head> <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Logowanie</title> </head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 18.01.16
 * Time: 12:15
 */

session_save_path('session/');
session_start();

include 'db.php';

if(isset($_POST['log'])) {

    if(empty($_POST['login']) || empty($_POST['password'])) {
        header("Location: index.php?error=5");
        exit;
    }

    $login = $_POST['login'];
    $password = $_POST['password'];

    $tabUser = $db->Prepare("SELECT * FROM  `uzytkownik` WHERE  `login` LIKE :login");
    $tabUser->bindParam(":login", $login, PDO::PARAM_STR);
    $tabUser->Execute();

    $tabUser = $tabUser->fetch(PDO::FETCH_ASSOC);

    // sprawdzanie poprawności hasła
    if($password != $tabUser['haslo']) {
        header("Location: index.php?error=4");
        exit;
    }


    $_SESSION['user'] = $tabUser['id'];

    if($tabUser['id'] == 1) {
        header("Location: administrator.php?success=1");
        exit;
    } else {
        header("Location: zalogowany.php?success=1");
        exit;
    }



}

if(isset($_POST['reg'])) {

    if(empty($_POST['imie']) || empty($_POST['nazwisko']) || empty($_POST['email']) || empty($_POST['login2']) ||
        empty($_POST['password']) || empty($_POST['password2'])) {
        header("Location: index.php?error=6");
        exit;
    }
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $login = $_POST['login2'];
    $haslo = $_POST['password'];
    $haslo2 = $_POST['password2'];

    // obsługa błędów dla hasła
    if($haslo != $haslo2) {
        header("Location: index.php?error=1");
        exit;
    }

    // sprawdzanie loginu
    $tabLogin = $db->Prepare("SELECT * FROM `uzytkownik` WHERE `login` LIKE :login");
    $tabLogin->bindParam(":login", $login, PDO::PARAM_STR);
    $tabLogin->Execute();
    $tabLogin = $tabLogin -> fetch(PDO::FETCH_ASSOC);

    if(!empty($tabLogin)) {
        header("Location: index.php?error=2");
        exit;
    }
    // sprawdzanie meila
    $tabEmail = $db->Prepare("SELECT * FROM `uzytkownik` WHERE `email` LIKE :email");
    $tabEmail->bindParam(":email", $email, PDO::PARAM_STR);
    $tabEmail->Execute();
    $tabEmail = $tabEmail -> fetch(PDO::FETCH_ASSOC);

    if(!empty($tabEmail)) {
        header("Location: index.php?error=3");
        exit;
    }


    $kod = md5(mt_rand());
    $db->Exec("INSERT INTO `uzytkownik` VALUES ('null', '$imie', '$nazwisko', '$email', '$login', '$haslo', '$kod')");

    $email_template = "email_template.html";
    $wiadomosc = file_get_contents($email_template);
    $wiadomosc = str_replace("[login]", $login, $wiadomosc);
    $wiadomosc = str_replace("[key]", $kod, $wiadomosc);
    $wiadomosc = str_replace("[url]", "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'], $wiadomosc);
    $naglowki = 'From listdlakrzycha@gmail.com' . "\r\n" .
        'Reply-To: listdlakrzycha@gmail.com'. "\r\n" .
        'Content-type: text/html; charset=utf-8' . "\r\n";

    mail($email, "Aktywacja konta " . $email, $wiadomosc, $naglowki);

    header("Location: index.php?success=3");
    exit;
}

if(isset($_GET['activate'])) {





    $kodpotwierdzajacy = $_GET['activate'];

    $tabKod = $db->Prepare("SELECT `kod` FROM  `uzytkownik` WHERE  `kod` LIKE :kodpotwierdzajacy");
    $tabKod->bindParam(":kodpotwierdzajacy", $kodpotwierdzajacy, PDO::PARAM_STR);
    $tabKod->Execute();
    $tabKod = $tabKod->fetch(PDO::FETCH_ASSOC);


    // nie ma takiego uzytkownika o takim kodzie;
    if(empty($tabKod)) {

        header("Location: index.php?error=0");
        exit;

    }

    $db->Exec("UPDATE `uzytkownik` SET `kod` = 'active' WHERE `kod` = '$kodpotwierdzajacy'");
    header("Location: index.php?success=0");
    exit;
}




?>



Zaloguj się.
<form action="logowanie.php" method="post">
    <input type="text" name="login" placeholder="Login" required/><br><br>
    <input type="text" name="password" placeholder="Hasło" required/><br><br>
    <input type="submit" name="log" value="Zaloguj"/>
</form>
<br>
Jeśli nie masz konta. Zarejestruj się.
<form action="logowanie.php" method="post">
    <input type="text" name="imie" placeholder="Imie" required/><br><br>
    <input type="text" name="nazwisko" placeholder="Nazwisko" required/><br><br>
    <input type="email" name="email" placeholder="E-mail" required/><br><br>
    <input type="text" name="login2" placeholder="Login" required/><br><br>
    <input type="password" name="password" placeholder="Hasło" required/><br><br>
    <input type="password" name="password2" placeholder="Powtórz hasło" required/><br><br>
    <input type="submit" name="reg" value="Rejestruj"/>
</form>




</body>
</html>
