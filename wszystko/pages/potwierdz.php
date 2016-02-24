<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 06.02.16
 * Time: 19:17
 */

session_save_path('session/');
session_start();

include 'db.php';


echo "Wyświetl wszystko";

$idklienta = $_SESSION['user'];
echo "$idklienta<br>";
if(isset($_POST['potwierdz'])) {

    $listaProdukt = "";

foreach($db->query("SELECT * FROM `koszyk` WHERE `idklienta` = '$idklienta'") as $row) {

        $idproduktu = $row['idproduktu'];
        $status = $row['status'];

        $listaProdukt = "$listaProdukt" . "$idproduktu";

    }

    $loginn = $db->query("SELECT * FROM `uzytkownik` WHERE `id` = '$idklienta'");
    $loginn = $loginn->fetch(PDO::FETCH_ASSOC);

    $login = $loginn['login'];
    $email = $loginn['email'];

    echo "test: $login $email $status $listaProdukt";


    $email_template = "pages/email_template_potwierdz_klient.html";
    $wiadomosc = file_get_contents($email_template);
    $wiadomosc = str_replace("[login]", $login, $wiadomosc);
    $wiadomosc = str_replace("[status]", $status, $wiadomosc);
    $wiadomosc = str_replace("[lista]", $listaProdukt, $wiadomosc);

    $naglowki = 'From listdlakrzycha@gmail.com' . "\r\n" .
        'Reply-To: listdlakrzycha@gmail.com'. "\r\n" .
        'Content-type: text/html; charset=utf-8' . "\r\n";

    mail($email, "Zamówienie " . $email, $wiadomosc, $naglowki);



    $admin = $db->query("SELECT * FROM `uzytkownik` WHERE `id` = 1");
    $admin = $admin->fetch(PDO::FETCH_ASSOC);

    $email = $admin['email'];


    $email_template = "pages/email_template_potwierdz_admin.html";
    $wiadomosc = file_get_contents($email_template);
    $wiadomosc = str_replace("[login]", $login, $wiadomosc);
    $wiadomosc = str_replace("[status]", $status, $wiadomosc);
    $wiadomosc = str_replace("[lista]", $listaProdukt, $wiadomosc);

    $naglowki = 'From listdlakrzycha@gmail.com' . "\r\n" .
        'Reply-To: listdlakrzycha@gmail.com'. "\r\n" .
        'Content-type: text/html; charset=utf-8' . "\r\n";

    mail($email, "Zamówienie " . $email, $wiadomosc, $naglowki);



    header("Location: zalogowany.php?success=6");
    exit;

}

?>

<form action="zalogowany.php?page=potwierdz" method="post">
    <input type="submit" name="potwierdz" value="Potwierdź zamówienie" />
</form>