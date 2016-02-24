<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 18.02.16
 * Time: 15:36
 */

$con = mysqli_connect('mysql.hostinger.pl','u108449187_2u','baza12','u108449187_2b');
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = $con->query("SELECT * FROM `uzytkownik`");
//$row = $result->fetch_assoc();
//print_r($row);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["imie"]. " " . $row["nazwisko"]. "<br>";
    }
} else {
    echo "0 results";
}
    $con->close();

?>