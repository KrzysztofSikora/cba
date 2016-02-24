<?php

/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 13.02.16
 * Time: 14:05
 */

class Product
{

    public $productID;
    public $category;
    public $quantity;
    public $price;
    public $image;
    public $productName;
    public $description;
    public $db;
    public $id;

    function __construct()
    {
        $this->db = new PDO("mysql:host=mysql.hostinger.pl;dbname=u108449187_2b","u108449187_2u","baza12");
    }

    function writeAll(){
        echo "<table border='2px'><tr><td>productId</td><td>category</td><td>quantity</td>
                    <td>price</td><td>image</td><td>productName</td><td>description</td></tr>";
        foreach($this->db->query('SELECT * FROM `product`') as $tabProduct) {

            $this->productID = $tabProduct['productID'];
            $this->category = $tabProduct['category'];
            $this->quantity = $tabProduct['quantity'];
            $this->price = $tabProduct['price'];
            $this->image = $tabProduct['image'];
            $this->productName = $tabProduct['productName'];
            $this->description = $tabProduct['description'];

            echo "<tr><td>$this->productId</td><td>$this->category</td><td>$this->quantity</td><td>$this->price</td><td>$this->description</td>
                    <td></td><td></td><td><img src='wyswietl.php?index=$this->productID' width='150' height='150'> </td>
                            <td>$this->productName</td><td>$this->description</td><td></td></tr>";


        }
        echo "</table>";


    }



}
