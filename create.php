
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
Kreiranje proizvoda
</title>
</head>
<body>
<h1>Novi proizvod</h1>

<form action="/insert.php" method="post">
    <input type="text" name="ime_proizvoda" placeholder="Ime proizvoda">
    <input type="number" name="cijena" placeholder="0.00">
    <button type="submit">Kreiraj</button>
</form>

</body>



</html>