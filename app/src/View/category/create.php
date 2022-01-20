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
        Kreiranje kategorija
    </title>
</head>
<body>
<h1>Nova kategorija</h1>

<form action="/category/create/" method="post">
    <input type="text" name="name" placeholder="Ime kategorije">
    <input type="text" name="seo_slug" placeholder="SEO">

    <select name="parent_id" id="parent_id">
        <option value="0">Paren ID</option>
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
