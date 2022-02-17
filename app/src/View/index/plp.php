<?php  /** @var array $data */?>
<html>
<head>
    <style>
        .container {
            width: 900px;
            margin: auto;
        }

        .row {}

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col {}

        .col {
            width: 25%;
        }

        .product h5 {text-align: center;}

        .product img {
            width: 80%;
            margin: auto;
            display: block;
        }

        .product .specs a {
            background: red;
            color: white;
            text-decoration: none;
            padding: 2px 10px;
            border-radius: 10px;
            transition: background .3s, color .3s;
            border: solid thin red;
        }

        .specs {
            margin-top: 7px;
            justify-content: space-around;
            display: flex;
        }

        .product:hover .specs a {
            background: orange;
            color cursor: progress;
        }

        .product .specs:hover a {
            background: yellow;
            color: orange;
        }

        .product .specs a:hover {
            background: white;
            color: red;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th,  {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #;

        .top_sell {
            position: fixed;
            left: 0;
            top: 200px;
            width: 158px;
        }
        }
        table{
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            position: fixed;
            left: 40px;
            top: 39px;
            width: 158px;
        }

    </style>
    <title>
        Roki fashion
    </title>
</head>
<body>



<div class="container">
    <div class="row">
        <div class="col-h">
            <h1>Roki </h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <?php foreach ($data['products'] as $product): ?>
            <div class="col">
                <div class="product">
                    <h5>
                        <?php echo $product['id']; ?>"><?php echo $product['ime_proizvoda']; ?>
                    </h5>
                    <?php if (!empty($product['slika'])) : ?>
                        <img src="<?php echo $product['slika']; ?>" alt="<?php echo $product['ime_proizvoda']; ?> ">
                    <?php endif; ?>
                    <?php echo $product['opis_proizvoda']; ?>

                    <div class="specs">
                        <span> <?php echo $product['id'] ?> KM</span>
                        <a href="/addtocard.php?id=<?php echo $product['id'] ?>">
                            KUPI
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>

</html>


