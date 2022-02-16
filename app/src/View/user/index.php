<?php /** @var array $data */?>
<html>
<head>

    <meta charset="utf-8">
    <title>Lista usera </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="/fonts/material-design-iconic-font/css/material-design-iconic-font.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            background-color: #;
        }

        img {
            max-width: 100%;
            height: auto;
        }
        a.update {
            background-color: blue;
        }



        a {
            padding: 3px 8px;
            border-radius: 7px;
            color: white;
            text-decoration: none;
        }

        a.delete {
            background-color: red;
        }

        td a+a {
            margin-left: 4px;
        }

    </style>
</head>
<body>

<h1>Lista usera</h1>
</a>
<hr>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Ime</th>
        <th>Pezime</th>
        <th>UserName</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($data as $user){

        ?>
        <tr>
            <td> <?php echo $user['id']; ?> </td>
            <td><?php echo $user['name'];  ?> </td>
            <td> <?php echo $user['last_prezime']; ?>  </td>
            <td> <?php echo $user['username']; ?>  </td>
            <td> <?php echo $user['email']; ?>  </td>
            <td>
                <a href="/user/update/<?php echo $user['id']; ?>" class="update">
                    Azuriraj
                </a>
                <a href="/user/delete/<?php echo $user['id']; ?>" class="delete">
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