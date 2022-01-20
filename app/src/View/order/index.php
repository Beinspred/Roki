<?php  /** @var array $data */ ?>

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

    foreach ($data as $order) {

        ?>
        <tr>
            <td> <?php echo $order['id']; ?> </td>
            <td><?php echo $order['ime_proizvoda']; ?> </td>
            <td><?php echo $order['cijena']; ?> KM</td>
            <td> <?php echo $order['opis_proizvoda']; ?>  </td>
            <td><img src="<?php echo $order['slika']; ?>" alt="<?php echo $order['ime_proizvoda']; ?> "></td>
            <td><?php echo $order['kolicina']; ?></td>
            <td><?php echo $order['ukupno']; ?> KM</td>


            <td>

            </td>
        </tr>
        <?php
    }


    ?>


    </tbody>
</table>
</body>

</html>