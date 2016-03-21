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
    public $dataAdd;
    public $addIP;
    public $db;

    function __construct()
    {
        $this->db = mysqli_connect('krzysztofsikora24.pl', 'krzysztofcba', 'bazacba12', 'krzysztofsikora24_pl');
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }


    function writeForm()
    {
//        <input type="text" name="category" placeholder="Kategoria"/><br><br>
        echo <<< ENT_DISALLOWED
<form action="index_unknow.php" enctype="multipart/form-data" method="post">


    <select name="category">
    <option value="technowinki">Technowinki</option>
    <option value="natura">Natura</option>
    <option value="nieporawni">Niepoprawni</option>
    <option value="inne">Inne</option>
  </select> <br><br>



    <input type="text" name="primaryName" placeholder="Nazwa obrazka"/><br><br>
    <input type="textr" name="description" placeholder="Opis"/><br><br>
    <input type="file" size="32" name="file_upload" value=""><br><br>
    <input type="submit" name="insertPicture" value="Dodaj obrazek"/>
</form>
ENT_DISALLOWED;


    }


    function addProduct($file_upload, $userID, $category, $primaryName, $description, $likes)
    {

        // validate()
        $dataAdd = date('Y-m-d H:i:s'); // 2009-07-09 22:30:59
        $addIP = $_SERVER['REMOTE_ADDR'];
        $f = $file_upload;
        $imgName = $f['name'];

        $image = addslashes(file_get_contents($file_upload['tmp_name']));
        //you keep your column name setting for insertion. I keep image type Blob.
        $query = "INSERT INTO pictures (imageID, userID, category, primaryName, description, likes, img, imgName, dataAdd, addIP)
                    VALUES('', '$userID', '$category', '$primaryName', '$description', '$likes', '$image', '$imgName',  '$dataAdd', '$addIP')";
        mysqli_query($this->db, $query);

    }

    function showImage($imageID)
    {

        $sql = "SELECT * FROM pictures WHERE imageID = '$imageID'";
        $sth = $this->db->query($sql);
        $result = mysqli_fetch_array($sth);
        return '<img src="data:image/jpeg;base64,' . base64_encode($result['img']) . '"/>';
    }

    function paginationProto($volume, $volOnPage)
    {
        // numeruje od ilość elementów, ile na stronie
        //10, 5
        //22, 11
        $tmp = $volume / $volOnPage;

        $numbPages = ceil($tmp);
        // zaokrąglam w górę po to zeby wyświetlić stronę z nie parzystej ilości elementów

        //echo "numPages: $numbPages";
        echo <<< ENT_DISALLOWED

<nav>
    <ul class="pagination">

ENT_DISALLOWED;
        for ($i = 1; $i <= $numbPages; $i++) {
//            echo "$i <br>";


            echo '<li><a href="' . '?page=' . $i . '">' . $i . '</a></li>';

        }
        echo <<< ENT_DISALLOWED

    </ul>
</nav>

ENT_DISALLOWED;

    }

    function paginationCategory($volume, $volOnPage, $category)
    {
        // numeruje od ilość elementów, ile na stronie
        //10, 5
        //22, 11
        $tmp = $volume / $volOnPage;

        $numbPages = ceil($tmp);
        // zaokrąglam w górę po to zeby wyświetlić stronę z nie parzystej ilości elementów

        //echo "numPages: $numbPages";
        echo <<< ENT_DISALLOWED

<nav>
    <ul class="pagination">

ENT_DISALLOWED;
        for ($i = 1; $i <= $numbPages; $i++) {
//            echo "$i <br>";


            echo '<li><a href="' . '?category=' . $category . '&' . 'page=' . $i . '">' . $i . '</a></li>';

        }
        echo <<< ENT_DISALLOWED

    </ul>
</nav>

ENT_DISALLOWED;

    }

    function paginationSearch($volume, $volOnPage, $category, $description)
    {
        // numeruje od ilość elementów, ile na stronie
        //10, 5
        //22, 11
        $tmp = $volume / $volOnPage;

        $numbPages = ceil($tmp);
        // zaokrąglam w górę po to zeby wyświetlić stronę z nie parzystej ilości elementów

        //echo "numPages: $numbPages";
        echo <<< ENT_DISALLOWED

<nav>
    <ul class="pagination">

ENT_DISALLOWED;
        for ($i = 1; $i <= $numbPages; $i++) {
//            echo "$i <br>";


            echo '<li><a href="' . '?category=' . $category . '&' . 'page=' . $i . '&' . 'searchValue=' . $description . '">' . $i . '</a></li>';

        }
        echo <<< ENT_DISALLOWED

    </ul>
</nav>

ENT_DISALLOWED;

    }

    function paginationTop($volume, $volOnPage)
    {
        // numeruje od ilość elementów, ile na stronie
        //10, 5
        //22, 11
        $tmp = $volume / $volOnPage;

        $numbPages = ceil($tmp);
        // zaokrąglam w górę po to zeby wyświetlić stronę z nie parzystej ilości elementów

        //echo "numPages: $numbPages";
        echo <<< ENT_DISALLOWED

<nav>
    <ul class="pagination">

ENT_DISALLOWED;
        for ($i = 1; $i <= $numbPages; $i++) {
//            echo "$i <br>";


            echo '<li><a href="' . '?category=' . 'top' . '&' . 'page=' . $i . '">' . $i . '</a></li>';

        }
        echo <<< ENT_DISALLOWED

    </ul>
</nav>

ENT_DISALLOWED;

    }

    function paginationAll($volume, $volOnPage)
    {
        // numeruje od ilość elementów, ile na stronie
        //10, 5
        //22, 11
        $tmp = $volume / $volOnPage;

        $numbPages = ceil($tmp);
        // zaokrąglam w górę po to zeby wyświetlić stronę z nie parzystej ilości elementów

        //echo "numPages: $numbPages";
        echo <<< ENT_DISALLOWED

<nav>
    <ul class="pagination">

ENT_DISALLOWED;
        for ($i = 1; $i <= $numbPages; $i++) {
//            echo "$i <br>";


            echo '<li><a href="' . '?category=' . 'all' . '&' . 'page=' . $i . '">' . $i . '</a></li>';

        }
        echo <<< ENT_DISALLOWED

    </ul>
</nav>

ENT_DISALLOWED;

    }

    function showPictureProto($imageID)
    {


        foreach ($this->db->query("SELECT * FROM `pictures` WHERE imageID = '$imageID'") as $result) {

            echo  '<div class="row jumbotron">

            <img
                    src="data:image/jpeg;base64,' . base64_encode($result['img']) . '"
                    class="img-responsive center-block"/></a><br>';

        }







    }

    function showPicture($min, $max)
    {


        foreach ($this->db->query("SELECT * FROM `pictures` LIMIT $min, $max") as $result) {

            echo '<div class="row jumbotron">

        <div class="thumbnail" style="text-align: center">
            <a href="?picture=' . $result['imageID'] . '"><img
                    src="data:image/jpeg;base64,' . base64_encode($result['img']) . '"
                    class="img-responsive center-block"/></a><br>

            <h3> ' . $result['description'] . '</h3>
            <p>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span>' . $result['likes'] . ' Like
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>' . $result['userID'] . ' Dodał
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>

                <div class="fb-comments" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture=' . $result['imageID'] . '"' .
                ' data-numposts="5"></div><br><br>

            </p>
            </div>
        </div>';
        }

    }

    function showPictureCategory($min, $max, $category)
    {

        foreach ($this->db->query("SELECT * FROM `pictures` WHERE category LIKE '$category' LIMIT $min, $max") as $result) {

            echo '<div class="row jumbotron">

        <div class="thumbnail" style="text-align: center">
            <a href="?picture=' . $result['imageID'] . '"><img
                    src="data:image/jpeg;base64,' . base64_encode($result['img']) . '"
                    class="img-responsive center-block"/></a><br>

            <h3> ' . $result['description'] . '</h3>
            <p>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span>' . $result['likes'] . ' Like
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>' . $result['userID'] . ' Dodał
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>

                <div class="fb-comments" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture=' . $result['imageID'] . '"' .
                ' data-numposts="5"></div><br><br>

            </p>
         </div>
        </div>';
        }

    }

    function showPictureSearch($min, $max, $description)
    {
        // pokazuje od elementu do ile elementów


        foreach ($this->db->query("SELECT * FROM `pictures` WHERE description LIKE '%$description%' LIMIT $min, $max") as $result) {

            echo '<div class="row jumbotron">

        <div class="thumbnail" style="text-align: center">
            <a href="?picture=' . $result['imageID'] . '"><img
                    src="data:image/jpeg;base64,' . base64_encode($result['img']) . '"
                    class="img-responsive center-block"/></a><br>

            <h3> ' . $result['description'] . '</h3>
            <p>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span>' . $result['likes'] . ' Like
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>' . $result['userID'] . ' Dodał
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>

                <div class="fb-comments" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture=' . $result['imageID'] . '"' .
                ' data-numposts="5"></div><br><br>

            </p>
        </div>';
//            <div class="fb-like" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture=' . $result['imageID'] . '"' .
//                'data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div> <br><br><br>

//
//            echo 'Liczba komenatrzy w commentBoxie wynosi:' .
//                $this->commentBoxCounter('krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture=' . $result['imageID']);
////            echo '</div>';
            echo '</div>';
        }
    }

    function showPictureAll($min, $max)
    {
        // pokazuje od elementu do ile elementów

        foreach ($this->db->query("SELECT * FROM `pictures` ORDER BY dataAdd DESC LIMIT $min, $max") as $result) {


            echo '<div class="row jumbotron">

        <div class="thumbnail" style="text-align: center">
            <a href="?picture=' . $result['imageID'] . '"><img
                    src="data:image/jpeg;base64,' . base64_encode($result['img']) . '"
                    class="img-responsive center-block"/></a><br>

            <h3> ' . $result['description'] . '</h3>
            <p>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span>' . $result['likes'] . ' Like
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>' . $result['userID'] . ' Dodał
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>

                <div class="fb-comments" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture=' . $result['imageID'] . '"' .
                ' data-numposts="5"></div><br><br>

            </p>
            </div>
        </div>';
        }

    }

    function counter()
    {
        // zlicza ilość elementów w bazie
        $result = $this->db->query("SELECT count(imageID) FROM `pictures`");
        $result = mysqli_fetch_assoc($result);

        return $result['count(imageID)'];
    }

    function counterCategory($category)
    {
        // zlicza ilość elementów w bazie
        $result = $this->db->query("SELECT count(imageID) FROM `pictures` WHERE category LIKE '$category'");
        $result = mysqli_fetch_assoc($result);

        return $result['count(imageID)'];
    }

    function counterSearch($description)
    {
        // zlicza ilość elementów w bazie szukanych po opisie
        $result = $this->db->query("SELECT count(imageID) FROM `pictures` WHERE description LIKE '%$description%'");
        $result = mysqli_fetch_assoc($result);

        return $result['count(imageID)'];
    }

    function cutterMin($page)
    {
        // 1 -> 0;
        // 2 -> 5;
        // 3 -> 10
        // 4 -> 15;

        $page = $page - 1;

        // 0 -> 0
        // 1 -> 5
        // 2 -> 10
        // 3 -> 15
        // 4 -> 20

        $cutMin = $page * 5;


        return $cutMin;
    }

    function commentBoxCounter($source_url)
    {

        $url = "http://api.facebook.com/restserver.php?method=links.getStats&urls=" . urlencode($source_url);
        $xml = file_get_contents($url);
        $xml = simplexml_load_string($xml);


        return $commentBoxCount = $xml->link_stat->commentsbox_count; // komenatrze
    }

    function onePicture($picture)
    {
        // $_GET['picture'];


        $result = $this->db->query("SELECT * FROM `pictures` WHERE imageID = '$picture'");
        $result = mysqli_fetch_assoc($result);


        echo '<img src="data:image/jpeg;base64,' . base64_encode($result['img']) . '" class="img-responsive center-block" style="text-align=center"/>' . '<br>';


    }

    function showPictureTop($min, $max)
    {

        foreach ($this->db->query("SELECT * FROM `pictures` ORDER BY likes DESC LIMIT $min, $max") as $result) {

            echo '<div class="row jumbotron">

        <div class="thumbnail" style="text-align: center">
            <a href="?picture=' . $result['imageID'] . '"><img
                    src="data:image/jpeg;base64,' . base64_encode($result['img']) . '"
                    class="img-responsive center-block"/></a><br>

            <h3> ' . $result['description'] . '</h3>
            <p>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span>' . $result['likes'] . ' Like
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>' . $result['userID'] . ' Dodał
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>
                <button type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>ilosc
                </button>

                <div class="fb-comments" data-href="http://krzysztofsikora24.pl/wszystko/obiektowy_obrazki/?picture=' . $result['imageID'] . '"' .
                ' data-numposts="5"></div><br><br>

            </p>
            </div>
        </div>';
        }
    }
}