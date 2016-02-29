<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 26.02.16
 * Time: 16:35
 */

session_save_path('session/');
session_start();

echo "index.php <br>";

if(isset($_SESSION['userID'])) {
    if($_SESSION['userID'] == 1) {
        include 'index_root.php'; // jesli jest zalogowany jako administrator

    } else {
        include 'index_client.php'; // jesli jest zalogowany jako klient
    }
} else {
    include 'index_unknow.php'; // jesli jest nie zalogowany
}

