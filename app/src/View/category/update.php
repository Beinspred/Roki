<?php /** @var array $data */?>

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
        Azuriranje kateogorije
    </title>
</head>
<body>
<h1>Azuriranje kateogorije</h1>

<form action="/category/update/ <?php echo $data['id']; ?>" method="post">
    <input type="text" name="name" placeholder="Ime kategorije" value="<?php echo $data['name']; ?>">
    <input type="number" name="parent_id" placeholder="parent_id" value="<?php echo $data['parent_id']; ?>">

    <button type="submit" name="submit">Azuriraj</button>
</form>

</body>

</html>