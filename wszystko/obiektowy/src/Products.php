<?php

/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 01.03.16
 * Time: 15:39
 */
class Products
{
    public $productID;
    public $productName;
    public $category;
    public $quantity;
    public $price;
    public $image;
    public $imgName;
    public $desc;
    public $db;

    function __construct()
    {
        $this->db = mysqli_connect('krzysztofsikora24.pl','krzysztofcba','bazacba12','krzysztofsikora24_pl');
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    function write() {
        $query = $this -> db->query("SELECT * from `products`");
        $query = $query->fetch_assoc();
        $id = $query['productID'];
        return $id;
    }

    function writeAll() {

        foreach($this->db->query('SELECT * FROM `products`') as $tabProducts) {
            $productName = $tabProducts['name'];
            echo "$productName <br>";

        }
    }

    function writeForm() {

        echo <<< ENT_DISALLOWED
            Dodaj produkt
<form action="index_unknow.php" enctype="multipart/form-data" method="post">
    <input type="text" name="productName" placeholder="Nazwa"/><br><br>
    <input type="text" name="category" placeholder="Kategoria"/><br><br>
    <input type="number" name="quantity" placeholder="Ilość"/><br><br>
    <input type="number" name="price" placeholder="Cena"/><br><br>
    <input type="text" name="desc" placeholder="Opis"/><br><br>
    <input type="file" size="32" name="file_upload" value=""><br><br>
    <input type="submit" name="insertProduct" value="Dodaj produkt"/>
</form>
ENT_DISALLOWED;


    }

    function addProduct($insertProduct, $file_upload, $productName, $category, $quantity, $price, $desc)
    {

        echo $insertProduct, $file_upload, $productName, $category, $quantity, $price, $desc;
        print_r($file_upload);


            $f = $file_upload;
            if (isset($f['name'])) {

                move_uploaded_file($f['tmp_name'],
                    $_SERVER['DOCUMENT_ROOT'].'/wszystko/obiektowy/images/'.$f['name']);
            }


            $imgName = $f['name'];
            $fp = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/wszystko/obiektowy/images/'. $imgName);
            echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/wszystko/obiektowy/images/'. $imgName);

            print_r($fp);
        $this->db->query("INSERT INTO `products` (productID) VALUES ( '$fp')");



    }

    function protoAdd($insertProduct, $file_upload, $productName, $category, $quantity, $price, $desc)
    {
        echo "$insertProduct, $file_upload, $productName, $category, $quantity, $price, $desc";
        //     $this->db->query("INSERT INTO `products` VALUES ('NULL', '$productName', '$category', '$quantity', '$price', NULL, NULL, '$desc')");
        $this->db->query("INSERT INTO `products` VALUES ('NULL', '$productName', '$category', '$quantity', '$price', 'null', 'null', '$desc')");
    }
}