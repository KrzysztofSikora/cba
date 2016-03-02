<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 25.01.16
 * Time: 15:58
 */

include 'db.php';

$id = $_GET['index'];

$query = $db->query("SELECT zdjecie from produkty where idproduktu = $id");

//header("Content-Type: image/jpg");

$query = $query->fetch(PDO::FETCH_ASSOC);

$sraka = $query['zdjecie'];

echo "$sraka";

?>