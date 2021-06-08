<?php
require_once('session.php');

$id= $_GET['id'];
if(empty($id)){
    die("Nema id za edit");

}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header('Location: /edit.php?='. $id);
    die;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime_proizvoda = $_POST['ime_proizvoda'];
    if (empty($ime_proizvoda)) {
        die ("Nema podataka za ime");
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cijena = $_POST['cijena'];
    if (empty($cijena)) {
        die ("Nema podataka za cijenu");
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $opis_proizvoda = $_POST['opis_proizvoda'];
    if (empty($opis_proizvoda)) {
        die ("Nema podataka za opis proizvoda");
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $kolicina = $_POST['kolicina'];
    if (empty($kolicina)) {
        die ("Nema podataka za kolicinu");
    }
}
$slika = '';

if(isset($_FILES['slika'])){
    $slika = '/image/' . $_FILES['slika']['name'];
    $tempname = $_FILES['slika']['tmp_name'];
    $file_destination = __DIR__ . '/..' .$slika;

    if (!move_uploaded_file($tempname, $file_destination)) {
        error_log("Error" . $sql . "</br> " . mysqli_error($conn));
        header('Location: /admin/edit.php?=' . $id);
        die;
    }
}

require_once('../connections_database.php');

$sql = "UPDATE products SET ime_proizvoda='{$ime_proizvoda}', cijena='{$cijena}', opis_proizvoda='{$opis_proizvoda}',kolicina='{$kolicina}', slika='{$slika}'   WHERE id='{$id}'";


if (mysqli_query($conn, $sql)) {
    error_log("Uspjesno dodat proizvod u bazu");
    header('Location: /admin/index.php');
} else {
    error_log("Error" . $sql . "</br> " . mysqli_error($conn));
    header('Location: /admin/edit.php?='. $id);
    die;
}


