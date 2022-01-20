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
        Edit proizvoda
    </title>
</head>
<body>
<h1>Edit proizvod</h1>

<form action="/product/update/<?php echo $data['product']['id']; ?>" method="post">
    <input type="text" name="ime_proizvoda" placeholder="Ime proizvoda"
           value="<?php echo $data['product']['ime_proizvoda']; ?>">
    <input type="number" name="cijena" placeholder="Cijena" value="<?php echo $data['product']['cijena']; ?>">
    <input type="text" name="opis_proizvoda" placeholder="Opis proizvoda"
           value="<?php echo $data['product']['opis_proizvoda']; ?>">
    <input type="text" name="kolicina" placeholder="Kolicina" value="<?php echo $data['product']['kolicina']; ?>">

    <select name="category_id" id="category_id">
        <?php foreach ($data['category'] as $category) { ?>
            <option
                <?php if ($category['id'] == $data['product']['category_id']) {
                    ?>
                    selected

                    <?php
                } ?>
                    value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>

            <?php
        }
        ?>

    </select>

    <input type="file" name="slika" placeholder="Slika proizvoda" value="<?php echo $data['product']['slika']; ?>">
    <button type="submit" name="submit">Edit</button>
</form>

</body>

</html>