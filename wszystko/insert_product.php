<html>
<head> <meta http-equiv="content-type" content="text/html; charset=utf-8"></html>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 25.01.16
 * Time: 15:10
 */

include 'db.php';

session_save_path('session/');
session_start();


//print_r($_POST);

//print_r($_FILES);

if(isset($_POST['insertProdukt'])) {

$f = $_FILES['plik_upload'];
if(isset($f['name']))
{
    move_uploaded_file($f['tmp_name'], '/home/u108449187/public_html/wszystko/images/'.$f['name']);
}
	if(empty($_POST['kategoria']) || empty($_POST['ilosc']) || empty($_POST['cena']) || empty($_POST['opis']) || empty($_FILES['plik_upload'])) {
        echo "Ankieta dodaj produkt, nie została wypełniona w całości.";
        header("Location: index.php?error=7");
        exit;
    }


    $name = $f['name'];
    $kategoria = $_POST['kategoria'];
    $ilosc = $_POST['ilosc'];
    $cena = $_POST['cena'];
    $opis = $_POST['opis'];

$stmt = $db->prepare("insert into produkty (kategoria, ilosc, cena, zdjecie, name, opis) values (?,?,?,?,?,?)");
$fp = file_get_contents("/home/u108449187/public_html/wszystko/images/$name");
    $stmt->bindParam(1, $kategoria);
    $stmt->bindParam(2, $ilosc);
    $stmt->bindParam(3, $cena);
    $stmt->bindParam(4, $fp);
    $stmt->bindParam(5, $name);
    $stmt->bindParam(6, $opis);

$stmt->execute();

    header("Location: index.php?success=4");
    exit;


}

?>


<form action="insert_product.php" enctype="multipart/form-data" method="post" ">

<input type="text" name="kategoria" placeholder="Kategoria"/><br><br>
<input type="number" name="ilosc" placeholder="Ilość"/><br><br>
<input type="number" name="cena" placeholder="Cena"/><br><br>
<input type="text" name="opis" placeholder="Opis"/><br><br>
<input type="file" size="32" name="plik_upload" value=""><br><br>
<input type="submit" name="insertProdukt" value="Dodaj produkt"/>
</form>


</body>

</html>