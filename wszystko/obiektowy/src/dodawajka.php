<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 01.03.16
 * Time: 19:28
 */

$db = mysqli_connect("krzysztofsikora24.pl","krzysztofcba","bazacba12","krzysztofsikora24_pl"); //keep your db name
$image = addslashes(file_get_contents($_FILES['images']['tmp_name']));
//you keep your column name setting for insertion. I keep image type Blob.
$query = "INSERT INTO products (productID,image) VALUES('','$image')";
$qry = mysqli_query($db, $query);



?>

<FORM ACTION="dodawajka.php" METHOD="POST" ENCTYPE="multipart/form-data">
    Zdjęcie: </td><td><INPUT type="file" name="images">
<input type="submit" name="ok" value="Wyślij zdjęcie do bazy"/>
</FORM>

