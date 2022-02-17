
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">


    <style>
        a.nav-link {
            color: #000000;
            text-decoration: none;
            background-color: transparent;
        }
        .dropdown {<?php  /** @var array $data */ ?>

            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>

    <title>Roki Home</title>
</head>


<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <nav class="navbar navbar-expand-sm justify-content-center">
                <ul class="nav navbar-nav">
                    <li class="nav-item">

                        <div class="dropdown">
                            <p>Category</p>

                            <div class="dropdown-content">
                                <?php
                                foreach ($data['category'] as $category) {
                                ?>
                                <ul>
                                    <li><a href="/cat/<?php echo $category['seo_slug']; ?>" ><?php echo $category['name']; ?></a></li>
                                </ul>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Wommen</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Men</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Teen</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Kids</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-md-1">
            <a href="#" class="nav-link">ROKI</a>

        </div>
        <div class="col-md">
            <nav class="navbar navbar-expand-sm justify-content-center">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Women</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Men</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Teen</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Kids</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php

foreach ($data['product'] as $product) {

    ?>
<a class="cart" href="/checkout.php">
    <svg width="50" height="50" viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M8 8H19C19 8 19.941 16.2521 21.1896 27M21.1896 27C23.2225 44.4994 26.0707 68.6147 27 74.5C28.5 84 29.5 84 37 84H97.5C103.398 83.3094 105.275 80.9491 107 74.5L115.5 34C116.047 27.7841 113.437 26.9255 107 27H21.1896Z" stroke="#000000" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M49 108.5C49 113.194 45.1944 117 40.5 117C35.8056 117 32 113.194 32 108.5C32 103.806 35.8056 100 40.5 100C45.1944 100 49 103.806 49 108.5ZM97 108.5C97 113.194 93.1944 117 88.5 117C83.8056 117 80 113.194 80 108.5C80 103.806 83.8056 100 88.5 100C93.1944 100 97 103.806 97 108.5Z" stroke="#000000" stroke-width="8"/>
    </svg>
</a>


<div class="container">
    <div class="row">
        <div class="col-h">

            <h1><?php echo $product['ime_proizvoda']; ?></h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-20">
            <div class="product">

                <img src="<?php echo $product['slika'] ?>" alt="<?php echo $product['ime_proizvoda'] ?>">
            </div>
        </div>
        <div class="col-80">
            <div class="product-detail">
                <h5>
                    <span><?php echo $product['cijena'] ?> KM</span>
                    <a href="/addtocard.php?id=<?php echo $product['id'] ?>"  class="buy">
                        KUPI
                    </a>
                </h5>
                <div class="description">
                    <p><?php echo $product['opis_proizvoda']?></p>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
}


?>
</body>
</html>


