<?php

    /**
     * Created by PhpStorm.
     * User: krzysztof
     * Date: 29.02.16
     * Time: 14:59
     */
class Pictures
{
    public $imageID;
    public $userID;
    public $name;
    public $desc;
    public $like;
    public $img;

    function __construct()
    {
        $this->db = mysqli_connect('krzysztofsikora24.pl','krzysztofcba','bazacba12','krzysztofsikora24_pl');
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }


    }

    function write() {
        $query = $this -> db->query("SELECT * from `pictures`");
        $query = $query->fetch_assoc();
        $id = $query['imageID'];
        return $id;
    }

    function writeAll() {

        foreach($this->db->query('SELECT * FROM `pictures`') as $tabPictures) {
            $name = $tabPictures['name'];
            echo "$name <br>";

        }
    }

    function addImage() {

    }

    function writeImage() {

    }

}
