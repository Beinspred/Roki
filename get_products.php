<?php
require_once('session.php');

require_once('connections_database.php');

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
$products = [];

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

var_dump($products);