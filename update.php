<?php


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



/*DATABASE*/
$servername = "localhost";
$username = "roki";
$password = "roki";
$roki = "roki";

$conn = mysqli_connect($servername, $username, $password, $roki);

if (!$conn) {
    die ("Connecetion failed: " . mysqli_connect_error());
}

$sql = "UPDATE products SET ime_proizvoda='{$ime_proizvoda}', cijena='{$cijena}' WHERE id='{$id}'";


//var_dump($sql);
//die();
if (mysqli_query($conn, $sql)) {
    error_log("Uspjesno dodat proizvod u bazu");
    header('Location: /');
} else {
    error_log("Error" . $sql . "</br> " . mysqli_error($conn));
    header('Location: /edit.php?='. $id);
    die;
}


