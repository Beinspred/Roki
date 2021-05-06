<?php
require_once('session.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ime_proizvoda = $_POST['ime_proizvoda'];
    if (empty($ime_proizvoda)){
        echo "Nema podataka za ime";
    } else {
       echo $ime_proizvoda;
    }
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $cijena = $_POST['cijena'];
    if(empty($cijena)){
        echo "Nema podataka za cijenu";
    } else {
      echo  $cijena;
    }

}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $opis_proizvoda = $_POST['opis_proizvoda'];
    if(empty($opis_proizvoda)){
        echo "Nema podataka za opis_proizvoda";
    } else {
        echo  $opis_proizvoda;
    }

}if($_SERVER['REQUEST_METHOD'] == "POST"){
    $slika = $_POST['slika'];
    if(empty($slika)){
        echo "Nema podataka za sliku";
    } else {
        echo  $slika;
    }

}

require_once('../connections_database.php');

$select = "SELECT  id, ime_proizvoda, cijena, opis_proizvoda, slika FROM products";
$rezultat = $conn ->query($select);
$proizvodi =[];

if($rezultat->num_rows > 0){
    while ($row = $rezultat->fetch_assoc()){
        $proizvodi []= $row;
    }

}

?>

<html>
 <head>
     <style>
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
<a href="/admin/create.php" class="create">
    Kreiraj novi proizvod
</a>
<hr>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Ime</th>
        <th>Cijena</th>
        <th>Opcije</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($proizvodi as $proizvod){

        ?>
        <tr>
            <td> <?php echo $proizvod['id']; ?> </td>
            <td><?php echo $proizvod['ime_proizvoda'];  ?> </td>
            <td> <?php echo $proizvod['opis_proizvoda']; ?>  </td>
            <td><img src="<?php echo $proizvod['slika']; ?>" alt="<?php echo $proizvod['ime_proizvoda']; ?> ">  </td>

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



