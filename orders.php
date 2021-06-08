<?php
session_start();
$product_ids = array_keys($_SESSION['korpa']);
$product_ids_string = implode(",", $product_ids);

require_once('./connections_database.php');
$select = "SELECT id,ime_proizvoda,cijena FROM products WHERE id IN ({$product_ids_string})";

$rezultat = $conn->query($select);
$proizvodi = [];

$total = 0;

if ($rezultat->num_rows > 0) {

    while ($row = $rezultat->fetch_assoc()) {
        $id = $row['id'];
        $row['kolicina'] = $_SESSION['korpa'][$id];
        $row['ukupno'] = $row['kolicina'] * $row['cijena'];
        $proizvodi [] = $row;
        $total += $row['ukupno'];

    }

}

$insert = "INSERT INTO orders (ukupno) VALUES ('{$total}')";

if (!$conn->query($insert)) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    die();
}
$orders_id = $conn->insert_id;

foreach ($proizvodi as $proizvod) {
    $insert_item = "INSERT INTO orders_items (orders_id,produts_id,kolicina,cijena,ukupno_items) 
    VALUES ('{$orders_id}', '{$proizvod['id']}','{$proizvod['kolicina']}', '{$proizvod['cijena']}','{$proizvod['ukupno']}')";



    if (!$conn->query($insert_item)) {
        var_dump($insert_item);
        die();
        echo "Error: " . $sql . "<br>" . $conn->error;
        die();
    }

}

//unset($_SESSION['korpa']);
//header('Location: /');
?>

<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: white;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="kupac">
    <h1>Registracija kupaca</h1>
    <p>Popunite podatke za dostavu</p>

    <hr>
    <label for="ime"><b>Ime i prezime</b></label>
    <input type="text" placeholder="Unesite Vase ime i prezime" name="ime" id="ime" required>

    <label for="name"><b>Korisnicko ime</b></label>
    <input type="text" placeholder="Unesite Vase korisnicko ime" name="name" id="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>


    <label for="telefon"><b>Broj telefona</b></label>
    <input type="text" placeholder="Unesite broj telefona" name="telefon" id="telefon" required>

    <label for="adresa"><b>Adresa</b></label>
    <input type="text" placeholder="Unesite adresu i broj ulice" name="adresa" id="adresa" required>

    <label for="grad"><b>Grad</b></label>
    <input type="text" placeholder="Unesite grad i postanski broj" name="grad" id="grad" required>

    <label for="napomene"><b>Dodatne napomene</b></label>
    <input type="text" placeholder="Dodatne napomene" name="napomene" id="napomene">

    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">Register</button>
</div>

<div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
</div>
</form>
</div>
</body>
</html>
