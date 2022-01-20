<?php  /** @var array $data */ ?>

<html>
<head>
    <meta charset="utf-8">
    <title>Kategorija proizvoda</title>
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
        a.edit {
            background-color: blue;
        }

        a.create {
            background-color: green;
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
    <title>
        Kategorija proizvoda
    </title>
</head>
<body>

<h1>Lista kategorija</h1>
<a href="/category/create" class="create">
    Kreiraj novu kategoriju
</a>
<hr>
<table>
    <thead>
    <tr>
        <th>Parent ID</th>
        <th>SEO</th>
        <th>Ime kategorije</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($data as $category){

        ?>
        <tr>
            <td> <?php echo $category['parent_id']; ?> </td>
            <td> <?php echo $category['seo_slug']; ?>  </td>
            <td><?php echo $category['name'];  ?> </td>


            <td>
                <a href="/category/update/<?php echo $category['id']; ?> " class="edit">
                    Azuriraj
                </a>
                <a href="/category/delete/<?php echo $category['id'] ?>" class="delete">
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