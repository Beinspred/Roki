<?php  /** @var array $data */ ?>

<html>
 <head>
     <meta charset="utf-8">
     <title>Registracija </title>
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
     Lista proizvoda
 </title>
 </head>
<body>

<h1>Lista proizvoda</h1>
<a href="/product/create/" class="create">
    Kreiraj novi proizvod
</a>
<hr>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Ime</th>
        <th>Cijena</th>
        <th>Opis proizvoda</th>
        <th>Kolicina</th>
        <th>slika</th>
        <th>category id</th>

        <th>Opcije</th>
    </tr>
    </thead>
    <tbody>
<?php

    foreach ($data as $proizvod){

        ?>
        <tr>
            <td> <?php echo $proizvod['id']; ?> </td>
            <td><?php echo $proizvod['ime_proizvoda'];  ?> </td>
            <td> <?php echo $proizvod['cijena']; ?>  </td>
            <td> <?php echo $proizvod['opis_proizvoda']; ?>  </td>
            <td> <?php echo $proizvod['kolicina']; ?>  </td>
            <td><img src="<?php echo $proizvod['slika']; ?>" alt="<?php echo $proizvod['ime_proizvoda']; ?> ">  </td>
            <td> <?php echo $proizvod['category_id']; ?>  </td>




            <td>
                <a href="/product/update/<?php echo $proizvod['id']; ?> " class="edit">
                    Azuriraj
                </a>
                <a href="/product/delete/<?php echo $proizvod['id'] ?>" class="delete">
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