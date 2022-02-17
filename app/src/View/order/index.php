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
        <th>Datum order</th>
        <th>Order count</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($data as $order) {

        ?>
        <tr>
            <td> <?php echo $order['order_id']; ?> </td>
            <td><?php echo $order['datum_order']; ?> </td>
            <td><?php echo $order['counter']; ?> </td>
        </tr>
        <?php
    }


    ?>
    <tr>
    <td>
        <a href="/order/list " class="edit">
            Show more
        </a>
    </td>
    </tr>
    </tbody>
</table>
</body>

</html>