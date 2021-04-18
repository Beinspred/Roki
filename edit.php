


<?php
if($_SERVER['REQUEST_METHOD']=="GET"){
        $id= $_GET['id'];
        if(empty($id)){
            error_log("Nema id za edit");
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

$select = "SELECT id,ime_proizvoda, cijena FROM products WHERE id='{$id}'";
$rezultat= $conn->query($select);
$proizvod = [];

if($rezultat ->num_rows > 0){
    while ($row = $rezultat->fetch_assoc()){
        $proizvod [] = $row;
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

<form action="/update.php?id=<?php echo $proizvod[0]['id']; ?>" method="post">
    <input type="text" name="ime_proizvoda" placeholder="" value="<?php echo $proizvod[0]['ime_proizvoda']; ?>">
    <input type="number" name="cijena" placeholder="" value="<?php echo $proizvod[0]['cijena']; ?>">
    <button type="submit">Edit</button>
</form>

</body>

</html>
