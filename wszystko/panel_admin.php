<html>
<head> <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Logowanie</title> </head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 18.01.16
 * Time: 16:23
 */

session_save_path('session/');
session_start();

include 'db.php';

echo "Panel admina";


if(isset($_POST['insert'])) {
    $db->Exec("INSERT INTO `uzytkownik` VALUES ('null', 'Żaner', 'Kaleta', 'email@wp.pl', 'zaner', 'zaner12')");
    header("Location: index.php?success=");
    exit;
}



?>

<form action="panel_admin.php" method="post">
    <input type="submit" name="insert" value="Dodaj użytkownika"/>
</form>


</body>
</html>
