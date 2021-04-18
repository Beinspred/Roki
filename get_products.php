<?php
$servername = "localhost";
$username = "roki";
$password = "roki";
$roki = "roki";

$conn = mysqli_connect($servername, $username, $password, $roki);

if (!$conn) {
    die ("Connecetion failed: " . mysqli_connect_error());
}

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