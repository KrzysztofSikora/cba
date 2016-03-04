<html>
<head>
<!--    administrator komentarzy z facebooka-->
    <meta property="fb:admins" content="100005557807089"/>

<!--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  <!--- kodowanie polskich znaków -->-->
<!---->
<!--    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="custom.css">-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<!--    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">-->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

</head>

<body>
<!--skrypt obsługujący komentarze facebook-->
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.5&appId=1776971415858954";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<!--skrypt obsługujący like button-->

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=1776971415858954";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>




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


//////////////// Produkty//
$product = new Pictures();

if(isset($_GET['picture'])) {
    $picture = $_GET['picture'];
    $product->onePicture($picture);
} else {



if(isset($_GET['page'])) {
    $page = $_GET['page'];
    if($page == "add") {

        $product->writeForm();


    }
}

if(isset($_GET['picture'])) {
    $picture = $_GET['picture'];
    $product->onePicture($picture);
}

if(isset($_POST['insertPicture'])) {
    $product->addProduct($_FILES['file_upload'], $_POST['userID'], $_POST['category'],
        $_POST['primaryName'], $_POST['description'], $_POST['$likes'] );
}

$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}


$product->showPicture($product->cutterMin($page), 5);


}


?>
    </div>


    <div class="jumbotron" style="text-align: center">
<?php

if(!(($page=='add') || isset($_GET['picture']))) {
    $product->paginationProto($product->counter(),5);
}
?>

    </div>
    <?php

echo "test";

    ?>
    </div>


</div>
</body>
</html>
