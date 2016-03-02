<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 01.03.16
 * Time: 19:36
 */



$db = mysqli_connect("krzysztofsikora24.pl","krzysztofcba","bazacba12","krzysztofsikora24_pl"); //keep your db name
$sql = "SELECT * FROM products WHERE productID = 40";
$sth = $db->query($sql);
$result=mysqli_fetch_array($sth);
echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';

?>