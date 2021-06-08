<?php
require_once('session.php');

if($_SERVER['REQUEST_METHOD']=="GET"){
        $id= $_GET['id'];
        if(empty($id)){
            error_log("Nema id za edit");
        }
}
//var_dump($_GET);
//die();

require_once('../connections_database.php');


$select = "SELECT id,ime_proizvoda, cijena, opis_proizvoda, kolicina, slika FROM products WHERE id='{$id}'";
$rezultat= $conn->query($select);
$proizvod = [];

if($rezultat ->num_rows > 0){
    while ($row = $rezultat->fetch_assoc()){
        $proizvod = $row;
    }
}
//var_dump($proizvod);
?>

<html>
<head>

    <style>
        h1 {
            text-align: center;
        }

        input, button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            border: none;
            padding: 1px 0px;
        }

        form {
            width: 300px;
            margin: auto;
        }

        button {margin: auto;}

        input {
            border-bottom: thin solid black;
        }

        input:focus {
            border-bottom: thin solid blue;
            outline: none;
        }

    </style>
<title>
Edit proizvoda
</title>
</head>
<body>
<h1>Edit proizvod</h1>

<form action="/admin/update.php?id=<?php echo $proizvod['id']; ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="ime_proizvoda" placeholder="Ime proizvoda" value="<?php echo $proizvod['ime_proizvoda']; ?>">
    <input type="number" name="cijena" placeholder="Cijena" value="<?php echo $proizvod['cijena']; ?>">
    <input type="text" name="opis_proizvoda" placeholder="Opis proizvoda" value="<?php echo $proizvod['opis_proizvoda']; ?>">
    <input type="text" name="kolicina" placeholder="Kolicina" value="<?php echo $proizvod['kolicina']; ?>">
    <input type="text" name="korekcija_kolicina" placeholder="Korekcija kolicina">


    <input type="file" name="slika" placeholder="Slika proizvoda" value="<?php echo $proizvod['slika']; ?>">
    <button type="submit" name="submit">Edit</button>
</form>

</body>

</html>
