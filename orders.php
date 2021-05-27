<?php
session_start();
$product_ids = array_keys($_SESSION['korpa']);
$product_ids_string =implode(",", $product_ids);

require_once('./connections_database.php');
$select= "SELECT id,ime_proizvoda,cijena FROM products WHERE id IN ({$product_ids_string})";

$rezultat = $conn->query($select);
$proizvodi=[];

$total = 0;

if($rezultat->num_rows>0){

    while ($row = $rezultat->fetch_assoc())
    {
        $id = $row['id'];
        $row['kolicina'] = $_SESSION['korpa'][$id];
        $row['ukupno'] = $row['kolicina'] * $row['cijena'];
        $proizvodi [] = $row;
        $total += $row['ukupno'];

    }

}

$insert = "INSERT INTO orders (ukupno) VALUES ('{$total}')";

if(!$conn->query($insert)){
    echo "Error: " . $sql . "<br>" . $conn->error;
    die();
}
$orders_id = $conn->insert_id;

foreach ($proizvodi as $proizvod){
    $insert_item = "INSERT INTO orders_items (orders_id,produts_id,kolicina,cijena,ukupno_items) 
    VALUES ('{$orders_id}', '{$proizvod['id']}','{$proizvod['kolicina']}', '{$proizvod['cijena']}','{$proizvod['ukupno']}')";

    if(!$conn->query($insert_item)){
        echo "Error: " . $sql . "<br>" . $conn->error;
        die();
    }

}

unset($_SESSION['korpa']);
header('Location: /');
