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
    public $description;
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
    <input type="text" name="description" placeholder="Opis"/><br><br>
    <input type="file" size="32" name="file_upload" value=""><br><br>
    <input type="submit" name="insertProduct" value="Dodaj produkt"/>
</form>
ENT_DISALLOWED;


    }


    function addProduct($insertProduct, $file_upload, $productName, $category, $quantity, $price, $description)
    {

        // validate()

        $f = $file_upload;
        $imgName = $f['name'];

        $image = addslashes(file_get_contents($file_upload['tmp_name']));
        //you keep your column name setting for insertion. I keep image type Blob.
        $query = "INSERT INTO products (productID, productName, category, quantity, price, image, imgName, description)
                    VALUES('', '$productName', '$category', '$quantity', '$price', '$image', '$imgName', '$description')";
        mysqli_query($this->db, $query);

    }

    function showImage($productID) {

        $sql = "SELECT * FROM products WHERE productID = '$productID'";
        $sth = $this->db->query($sql);
        $result=mysqli_fetch_array($sth);
        return '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
    }

    function paginationProto($volume, $volOnPage) {

        //10, 5
        $numbPages = $volume/$volOnPage;
        echo <<< ENT_DISALLOWED

            <nav>
    <ul class="pagination">
        <li>
            <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
ENT_DISALLOWED;
        for($i=1; $i<=$numbPages; $i++) {
//            echo "$i <br>";


        echo '<li><a href="'.'?page='.$i  .'">'.$i.'</a></li>';

        }
            echo <<< ENT_DISALLOWED
            <li>
            <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>

ENT_DISALLOWED;

    }

    function showProduct($min, $max) {

       echo "<div style=\"float: left; padding: 6%\">";
       echo "<table border=2px>";

        foreach($this->db->query("SELECT * FROM `products` LIMIT $min, $max") as $result) {
            echo "<tr>";
            echo "<td>" . $result['productID'] ."</td>";
            echo "<td>" .$result['productName']."</td>";
            echo "<td>" .$result['category']."</td>";
            echo "<td>" .$result['quantity']."</td>";
            echo "<td>" . $result['price']."</td>";
            echo "<td>".'<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'" height="120" width="120"/>'."</td>";
            echo "<td>" .$result['description']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }

    function counter() {
        $result = $this->db->query("SELECT count(productID) FROM `products`");
        $result =mysqli_fetch_assoc($result);

        return $result['count(productID)'];
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

        $page = $page * 5 - 1;
        // 0 -> 4
        // 1 -> 9
        // 2 -> 14
        // 3 -> 19
        // 4 -> 24

        $cutMax = $page;

        return $cutMax;

    }
}