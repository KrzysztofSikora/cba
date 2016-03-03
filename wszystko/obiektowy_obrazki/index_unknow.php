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
<html>
<body>
<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
        <ul class="nav nav-pills">
<!--            <li role="presentation" class="active"><a href="#">Home</a></li>-->
            <li role="presentation"><a href="?page=add">Dodaj obraz</a></li>
<!--            <li role="presentation"><a href="#">Messages</a></li>-->
        </ul>
    </nav>
</div>


<div class="container" style="padding-top: 100px">
    <div class="jumbotron">
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



include 'src/Pictures.php';


//////////////// Produkty
$product = new Pictures();

if(isset($_GET['page'])) {
    $page = $_GET['page'];
    if($page == "add") {

        $product->writeForm();


    }
}

if(isset($_POST['insertPicture'])) {
    $product->addProduct($_FILES['file_upload'], $_POST['userID'], $_POST['category'],
        $_POST['primaryName'], $_POST['description'], $_POST['$likes'] );
}

$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}


$product->showProduct($product->cutterMin($page), 5);





?>
    </div>


    <div class="jumbotron" style="text-align: center">
<?php

$product->paginationProto($product->counter(),5);

?>

    </div>
</div>
</body>
</html>
