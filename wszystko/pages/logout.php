<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 20.01.16
 * Time: 16:59
 */

session_save_path('session/');
session_start();

include 'db.php';

if(isset($_GET['page'])) {

    session_destroy();
    header("Location: index.php?success=2");
    exit;

}

?>