<?php /** @var array $data */ ?>

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

        button {
            margin: auto;
        }

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
<form action="/product/create/" method="post">
    <input type="text" name="ime_proizvoda" placeholder="Ime proizvoda">
    <input type="number" name="cijena" placeholder="0.00">
    <input type="text" name="opis_proizvoda" placeholder="Opis_proizvoda">
    <input type="text" name="kolicina" placeholder="Kolicina">
    <input type="file" name="slika" placeholder="slika" >
    <select name="parent_id" id="parent_id">
        <option value="0">Odaberi Kategoriju</option>
        <?php foreach ($data['category'] as $category) { ?>
            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
            <?php
        }
        ?>
    </select>
    <button type="submit">Kreiraj</button>
</form>
</body>
</html>

