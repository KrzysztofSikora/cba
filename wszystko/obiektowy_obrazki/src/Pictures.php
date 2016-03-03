<?php

/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 01.03.16
 * Time: 15:39
 */
class Pictures
{
    public $imageID;
    public $userID;
    public $category;
    public $name;
    public $description;
    public $like;
    public $img;
    public $imgName;
    public $db;

    function __construct()
    {
        $this->db = mysqli_connect('krzysztofsikora24.pl','krzysztofcba','bazacba12','krzysztofsikora24_pl');
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }



    function writeForm() {

        echo <<< ENT_DISALLOWED
            Dodaj produkt
<form action="index_unknow.php" enctype="multipart/form-data" method="post">
    <input type="number" name="userID" placeholder="userID"/><br><br>
    <input type="text" name="category" placeholder="Kategoria"/><br><br>
    <input type="text" name="primaryName" placeholder="primaryName"/><br><br>
    <input type="textr" name="description" placeholder="Opis"/><br><br>
    <input type="number" name="likes" placeholder="Likes"/><br><br>
    <input type="file" size="32" name="file_upload" value=""><br><br>
    <input type="submit" name="insertPicture" value="Dodaj produkt"/>
</form>
ENT_DISALLOWED;


    }


    function addProduct($file_upload, $userID, $category, $primaryName, $description, $likes)
    {

        // validate()

        $f = $file_upload;
        $imgName = $f['name'];

        $image = addslashes(file_get_contents($file_upload['tmp_name']));
        //you keep your column name setting for insertion. I keep image type Blob.
        $query = "INSERT INTO pictures (imageID, userID, category, primaryName, description, likes, img, imgName)
                    VALUES('', '$userID', '$category', '$primaryName', '$description', '$likes', '$image', '$imgName')";
        mysqli_query($this->db, $query);

    }

    function showImage($imageID) {

        $sql = "SELECT * FROM pictures WHERE imageID = '$imageID'";
        $sth = $this->db->query($sql);
        $result=mysqli_fetch_array($sth);
        return '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
    }

    function paginationProto($volume, $volOnPage) {
        // numeruje od ilość elementów, ile na stronie
        //10, 5
        //22, 11
        $tmp = $volume/$volOnPage;

        $numbPages = ceil($tmp);
            // zaokrąglam w górę po to zeby wyświetlić stronę z nie parzystej ilości elementów

        //echo "numPages: $numbPages";
        echo <<< ENT_DISALLOWED

<nav>
    <ul class="pagination">

ENT_DISALLOWED;
        for($i=1; $i<=$numbPages; $i++) {
//            echo "$i <br>";


        echo '<li><a href="'.'?page='.$i  .'">'.$i.'</a></li>';

        }
            echo <<< ENT_DISALLOWED

    </ul>
</nav>

ENT_DISALLOWED;

    }

    function showProduct($min, $max) {
        // pokazuje od elementu do ile elementów
       echo '<div style="text-align: center">';

        foreach($this->db->query("SELECT * FROM `pictures` LIMIT $min, $max") as $result) {


            echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['img'] ).'" />' .'<br>';
            echo 'imageID: '.$result['imageID'] .'<br>';
            echo 'userID: '.$result['userID'].'<br>';
            echo 'category: '.$result['category'].'<br>';
            echo 'primaryName: '.$result['primaryName'].'<br>';
            echo 'description: '.$result['description'].'<br>';
            echo 'likes: '.$result['likes'].'<br>';
            echo 'imgName: '.$result['imgName'].'<br><br><br>';


        }
        echo "</div>";
    }

    function counter() {
        // zlicza ilość elementów w bazie
        $result = $this->db->query("SELECT count(imageID) FROM `pictures`");
        $result =mysqli_fetch_assoc($result);

        return $result['count(imageID)'];
    }

    function cutterMin($page) {
        // 1 -> 0;
        // 2 -> 5;
        // 3 -> 10
        // 4 -> 15;

        $page = $page -1;

        // 0 -> 0
        // 1 -> 5
        // 2 -> 10
        // 3 -> 15
        // 4 -> 20

        $cutMin = $page * 5;


        return $cutMin;
    }
    function cutterMax($page) {

        $page = $page * 5;
        // 0 -> 5
        // 1 -> 10
        // 2 -> 15
        // 3 -> 20
        // 4 -> 25

        $cutMax = $page;

        return $cutMax;

    }
}