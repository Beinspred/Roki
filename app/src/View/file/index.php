<?php  /** @var array $data */ ?>

<html>
<head>
    <meta charset="utf-8">
    <title>File manager</title>
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
    <title> File manager</title>
</head>
<body>

<h1>uploaded files </h1>
<a href="/file/create" class="create"> Upload file</a>
<hr>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Size</th>

    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($data as $file){

        ?>
        <tr>
            <td> <?php echo $file['id']; ?> </td>
            <td> <?php echo $file['name']; ?>  </td>
            <td><?php echo $file['type'];  ?> </td>
            <td><?php echo $file['size'];  ?> </td>

            <td>
                <a href="/file/update/<?php echo $file['id']; ?> " class="edit">
                    Update
                </a>
                <a href="/file/delete/<?php echo $file['id'] ?>" class="delete">
                    Delete
                </a>
                <a href="/file/delete/<?php echo $file['id'] ?>" class="edit">
                    Download
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