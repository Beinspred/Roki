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

<h1>Show</h1>

<hr>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Ime</th>
        <th>Opis proizvoda</th>
        <th>Slika proizvoda</th>
        <th>Cijena</th>
        <th>Kolicina</th>
        <th>Ukupno</th>


        <th>Opcije</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($data['items'] as $item) {

        ?>
        <tr>
            <td> <?php echo $item['id']; ?> </td>
            <td><?php echo $item['ime_proizvoda']; ?> </td>
            <td> <?php echo $item['opis_proizvoda']; ?>  </td>
            <td><img src="<?php echo $item['slika']; ?>" alt="<?php echo $item['ime_proizvoda']; ?> "></td>
            <td><?php echo $item['cijena']; ?> KM</td>
            <td><?php echo $item['kolicina']; ?></td>
            <td><?php echo $item['ukupno']; ?> KM</td>


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
