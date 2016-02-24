<?php

/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 13.02.16
 * Time: 14:12
 */
class Shop
{

    public $orderID;
    public $productID;
    public $userID;
    public $ordersQuantity;
    public $status;
    public $shipment;
    public $orderDate;
    public $shipmentDate;
    public $db;

    function __construct()
    {
        $this->db = new PDO("mysql:host=mysql.hostinger.pl;dbname=u108449187_2b", "u108449187_2u", "baza12");
    }

    function writeAll() {

        echo "<table><tr><td>orderID</td><td>productID</td><td>quantity</td><td>status</td><td>shipment</td>
                <td>orderDate</td><td>shipmentDate</td></tr>";
        foreach ($this->db->query("SELECT * FROM `shop`") as $tabShop) {
            $this->orderID = $tabShop['orderID'];
            $this->productID = $tabShop['productID'];
            $this->ordersQuantity = $tabShop['ordersQuantity'];
            $this->status = $tabShop['status'];
            $this->shipment = $tabShop['shipment'];
            $this->orderDate = $tabShop['orderDate'];
            $this->shipmentDate = $tabShop['shipmentDate'];

            echo "<tr><td>$this->orderID</td><td>$this->productID</td><td>$this->ordersQuantity</td><td>$this->status</td>
                    <td>$this->shipment</td><td>$this->orderDate</td><td>$this->shipmentDate</td></tr>";
        }

        echo "</table>";


    }
}