<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 24.02.16
 * Time: 19:59
 */


//if (preg_match('@^[0-9]{2}-[0-9]{3}$@', $_POST['pole'])) {
//    echo('ok');
//} else {
//    echo("error");
//}


//if (preg_match('@^[A-Z][a-z]{2,10} [A-Z][a-z]{2,15}$@', $_POST['pole'])) {
//    echo('ok');
//} else {
//    echo("error");
//}


if (preg_match('@^[^a-z]+$@', $_POST['pole'])) {
    echo('ok');
} else {
    echo("error");
}
?>

<form method="post" action="wyrazenia.php">
    <input type="text" name="pole">
    <input type="submit" value="Wyslij">
</form>
