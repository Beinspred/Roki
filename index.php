<?php

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


$servername = "localhost";
$username = "roki";
$password = "roki";
$roki = "roki";

$conn = mysqli_connect($servername, $username, $password, $roki);

if (!$conn) {
    die ("Connecetion failed: " . mysqli_connect_error());
}

//$sql = "INSERT INTO products (ime_proizvoda, cijena)
// VALUES ('{$ime_proizvoda}', '{$cijena}')";
//
//if(mysqli_query($conn, $sql)){
//    echo "uspjesno dodat proizvod u bazu";
//} else {
//    echo "Error" . $sql. "</br> ". mysqli_error($conn);
//}


//
//$stat = $conn ->prepare("INSERT INTO products(ime_proizvoda, cijena)
//VALUES ('{$ime_proizvoda}' , '{$cijena}')");
//$stat ->bind_param("sss", $ime_proizvoda, $cijena);

$select = "SELECT  id, ime_proizvoda, cijena FROM products";
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
<a href="/create.php" class="create">
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
            <td> <?php echo $proizvod['cijena']; ?>  </td>
            <td>
                <a href="/edit.php?id=<?php echo $proizvod['id']; ?> " class="edit">
                    Azuriraj
                </a>
                <a href="/delete.php?id=<?php echo $proizvod['id'] ?>" class="delete">
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



