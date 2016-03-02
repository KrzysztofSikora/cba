<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
      integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
      integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">

</script>


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
include 'src/Products.php';

//echo "index_unknow.php <br>";
//
//$uzytkownik = new Users();
//
//echo "Metoda wypisz(): <br>";
//echo $uzytkownik->write();
//$uzytkownik->writeAll();
//
//// logowanie
//$uzytkownik->writeForm();
//if(isset($_POST['log'])) {
//    echo $uzytkownik->login($_POST['login'], $_POST['password']);
//}
//
//if(isset($_POST['reg'])) {
//    $uzytkownik->registry($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['login'], $_POST['password'], $_POST['password2']);
//}
//
//$uzytkownik->userActivate($_GET['activate']);
//echo "<br><br><br> Klasa produkty <br>_____________________<br>";
////////////////// Produkty
$product = new Products();
//
//$product->writeForm();
////$product->writeAll();
//
//
//
//$product->addProduct($_POST['insertProduct'],$_FILES['file_upload'], $_POST['productName'], $_POST['category'],
//    $_POST['quantity'], $_POST['price'], $_POST['description']);


//echo $product->showImage(66);

$product->paginationProto(10,5);

?>