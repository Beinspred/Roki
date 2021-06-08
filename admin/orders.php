<?php
require_once('../connections_database.php');

$sql = "SELECT * FROM orders_items INNER JOIN orders ON orders_items.orders_id=orders.id  
INNER JOIN products ON products.id=orders_items.orders_id";

$rezultat = $conn->query($sql);
$proizvodi = [];

$total = 0;

if ($rezultat->num_rows > 0) {

    while ($row = $rezultat->fetch_assoc()) {
        $proizvodi [] = $row;
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <style>

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #FFFFFF;
        }
    </style>

    <title>
        Admin panel
    </title>
</head>
<body>

<h1>Orders</h1>

<hr>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Ime</th>
        <th>Cijena</th>
        <th>Opis proizvoda</th>
        <th>Slika proizvoda</th>
        <th>Kolicina</th>
        <th>Cijena kostanja</th>


        <th>Opcije</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($proizvodi as $proizvod) {

        ?>
        <tr>
            <td> <?php echo $proizvod['id']; ?> </td>
            <td><?php echo $proizvod['ime_proizvoda']; ?> </td>
            <td><?php echo $proizvod['cijena']; ?> KM</td>
            <td> <?php echo $proizvod['opis_proizvoda']; ?>  </td>
            <td><img src="<?php echo $proizvod['slika']; ?>" alt="<?php echo $proizvod['ime_proizvoda']; ?> "></td>
            <td> <?php echo $proizvod['opis_proizvoda']; ?>  </td>
            <td><?php echo $proizvod['kolicina']; ?></td>
            <td><?php echo $proizvod['ukupno']; ?> KM</td>


            <td>
                <a href="/admin/edit.php?id=<?php echo $proizvod['id']; ?> " class="edit">
                    Azuriraj
                </a>
                <a href="/admin/delete.php?id=<?php echo $proizvod['id'] ?>" class="delete">
                    Obrisi
                </a>
            </td>
        </tr>
        <?php
    }


    ?>


    </tbody>
</table>
</body>

</html>