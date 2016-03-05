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
//        <input type="text" name="category" placeholder="Kategoria"/><br><br>
        echo <<< ENT_DISALLOWED
            Dodaj produkt
<form action="index_unknow.php" enctype="multipart/form-data" method="post">
    <input type="number" name="userID" placeholder="userID"/><br><br>

    <select name="category">
    <option value="technowinki">Technowinki</option>
    <option value="natura">Natura</option>
    <option value="nieporawni">Niepoprawni</option>
    <option value="inne">Inne</option>
  </select> <br><br>



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
        return '<img src="data:image/jpeg;base64,'.base64_encode( $result['img'] ).'"/>';
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

    function paginationCategory($volume, $volOnPage, $category) {
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


            echo '<li><a href="'.'?category='.$category.'&'.'page='.$i  .'">'.$i.'</a></li>';

        }
        echo <<< ENT_DISALLOWED

    </ul>
</nav>

ENT_DISALLOWED;

    }

    function paginationSeach($volume, $volOnPage, $category, $description) {
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


            echo '<li><a href="'.'?category='.$category.'&'.'page='.$i  .'&'.'searchValue='.$description.'">'.$i.'</a></li>';

        }
        echo <<< ENT_DISALLOWED

    </ul>
</nav>

ENT_DISALLOWED;

    }

    function showPicture($min, $max) {
        // pokazuje od elementu do ile elementów
       echo '<div style="text-align: center">';

        foreach($this->db->query("SELECT * FROM `pictures` LIMIT $min, $max") as $result) {

//            echo '<div class="embed-responsive embed-responsive-4by3">
//  <iframe class="embed-responsive-item" src="data:image/jpeg;base64,'.base64_encode( $result['img'] ).'"></iframe>
//</div>';
            echo '<a href="?picture='.$result['imageID'].'"><img src="data:image/jpeg;base64,' . base64_encode($result['img']) . '" class="img-responsive center-block" style="text-align=center"/></a>' . '<br>';
            echo 'imageID: ' . $result['imageID'] . '<br>';
            echo 'userID: ' . $result['userID'] . '<br>';
            echo 'category: ' . $result['category'] . '<br>';
            echo 'primaryName: ' . $result['primaryName'] . '<br>';
            echo 'description: ' . $result['description'] . '<br>';
            echo 'likes: ' . $result['likes'] . '<br>';
            echo 'imgName: ' . $result['imgName'] . '<br><br><br>';

            echo '<div class="fb-comments" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture=' . $result['imageID'] .'"'.
                ' data-numposts="5"></div><br><br>';

            echo '<div class="fb-like" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture=' . $result['imageID'] .'"'.
                'data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div> <br><br><br>';

            echo 'Liczba komenatrzy w commentBoxie wynosi:' .
                $this->commentBoxCounter('krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture='.$result['imageID']);
        }
        echo "</div>";
    }

    function showPictureCategory($min, $max, $category) {
        // pokazuje od elementu do ile elementów
        echo '<div style="text-align: center">';

        foreach($this->db->query("SELECT * FROM `pictures` WHERE category LIKE '$category' LIMIT $min, $max") as $result) {

//            echo '<div class="embed-responsive embed-responsive-4by3">
//  <iframe class="embed-responsive-item" src="data:image/jpeg;base64,'.base64_encode( $result['img'] ).'"></iframe>
//</div>';
            echo '<a href="?picture='.$result['imageID'].'"><img src="data:image/jpeg;base64,' . base64_encode($result['img']) . '" class="img-responsive center-block" style="text-align=center"/></a>' . '<br>';
            echo 'imageID: ' . $result['imageID'] . '<br>';
            echo 'userID: ' . $result['userID'] . '<br>';
            echo 'category: ' . $result['category'] . '<br>';
            echo 'primaryName: ' . $result['primaryName'] . '<br>';
            echo 'description: ' . $result['description'] . '<br>';
            echo 'likes: ' . $result['likes'] . '<br>';
            echo 'imgName: ' . $result['imgName'] . '<br><br><br>';

            echo '<div class="fb-comments" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture=' . $result['imageID'] .'"'.
                ' data-numposts="5"></div><br><br>';

            echo '<div class="fb-like" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture=' . $result['imageID'] .'"'.
                'data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div> <br><br><br>';

            echo 'Liczba komenatrzy w commentBoxie wynosi:' .
                $this->commentBoxCounter('krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture='.$result['imageID']);
        }
        echo "</div>";
    }

    function showPictureSearch($min, $max, $description) {
        // pokazuje od elementu do ile elementów
        echo '<div style="text-align: center">';

        foreach($this->db->query("SELECT * FROM `pictures` WHERE description LIKE '%$description%' LIMIT $min, $max") as $result) {

//            echo '<div class="embed-responsive embed-responsive-4by3">
//  <iframe class="embed-responsive-item" src="data:image/jpeg;base64,'.base64_encode( $result['img'] ).'"></iframe>
//</div>';
            echo '<a href="?picture='.$result['imageID'].'"><img src="data:image/jpeg;base64,' . base64_encode($result['img']) . '" class="img-responsive center-block" style="text-align=center"/></a>' . '<br>';
            echo 'imageID: ' . $result['imageID'] . '<br>';
            echo 'userID: ' . $result['userID'] . '<br>';
            echo 'category: ' . $result['category'] . '<br>';
            echo 'primaryName: ' . $result['primaryName'] . '<br>';
            echo 'description: ' . $result['description'] . '<br>';
            echo 'likes: ' . $result['likes'] . '<br>';
            echo 'imgName: ' . $result['imgName'] . '<br><br><br>';

            echo '<div class="fb-comments" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture=' . $result['imageID'] .'"'.
                ' data-numposts="5"></div><br><br>';

            echo '<div class="fb-like" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture=' . $result['imageID'] .'"'.
                'data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div> <br><br><br>';

            echo 'Liczba komenatrzy w commentBoxie wynosi:' .
                $this->commentBoxCounter('krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture='.$result['imageID']);
        }
        echo "</div>";
    }
    function counter() {
        // zlicza ilość elementów w bazie
        $result = $this->db->query("SELECT count(imageID) FROM `pictures`");
        $result =mysqli_fetch_assoc($result);

        return $result['count(imageID)'];
    }

    function counterCategory($category) {
        // zlicza ilość elementów w bazie
        $result = $this->db->query("SELECT count(imageID) FROM `pictures` WHERE category LIKE '$category'");
        $result =mysqli_fetch_assoc($result);

        return $result['count(imageID)'];
    }

    function counterSearch($description) {
        // zlicza ilość elementów w bazie szukanych po opisie
        $result = $this->db->query("SELECT count(imageID) FROM `pictures` WHERE description LIKE '%$description%'");
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

    function commentBoxCounter($source_url) {

        $url = "http://api.facebook.com/restserver.php?method=links.getStats&urls=".urlencode($source_url);
        $xml = file_get_contents($url);
        $xml = simplexml_load_string($xml);


        return $commentBoxCount = $xml->link_stat->commentsbox_count; // komenatrze
    }

    function onePicture($picture) {
        // $_GET['picture'];


        $result = $this->db->query("SELECT * FROM `pictures` WHERE imageID = '$picture'");
        $result =mysqli_fetch_assoc($result);

            echo '<img src="data:image/jpeg;base64,' . base64_encode($result['img']) . '" class="img-responsive center-block" style="text-align=center"/>' . '<br>';
//            echo 'imageID: ' . $result['imageID'] . '<br>';
//            echo 'userID: ' . $result['userID'] . '<br>';
//            echo 'category: ' . $result['category'] . '<br>';
//            echo 'primaryName: ' . $result['primaryName'] . '<br>';
//            echo 'description: ' . $result['description'] . '<br>';
//            echo 'likes: ' . $result['likes'] . '<br>';
//            echo 'imgName: ' . $result['imgName'] . '<br><br><br>';
//            echo '<div class="fb-comments" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/' . $result['imageID'] .'"'.
//                ' data-numposts="5"></div><br><br>';
//
//            echo '<div class="fb-like" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/' . $result['imageID'] .'"'.
//                'data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div> <br>';
//
//            echo 'Liczba komenatrzy w commentBoxie wynosi:' .
//                $this->commentBoxCounter('krzysztofsikora24.pl/wszystko/obiektowy_obrazki/'.$result['imageID']);
//            echo "</div>";

////


    }
}