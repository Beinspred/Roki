<?php
ini_set('display_errors', 'On');
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

?>
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
        <div class="col">
            <div class="product">
                <h5><a href="#">Ime proizvoda</a></h5>
                <img src="https://placeimg.com/200/300/animals?1" alt="Zivotinja">
                <div class="specs">
                    <span>40.00 KM</span>
                    <a href="/addtocard.php?id=<?php echo $proizvod['id'] ?>" >
                        KUPI
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="product">
                <h5><a href="#">Ime proizvoda</a></h5>
                <img src="https://placeimg.com/200/300/animals?2" alt="Zivotinja">
                <div class="specs">
                    <span>40.00 KM</span>
                    <a href="/addtocard.php?id=<?php echo $proizvod['id'] ?>" >
                        KUPI
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="product">
                <h5><a href="#">Ime proizvoda</a></h5>
                <img src="https://placeimg.com/200/300/animals?3" alt="Zivotinja">
                <div class="specs">
                    <span>40.00 KM</span>
                    <a href="/addtocard.php?id=<?php echo $proizvod['id'] ?>" >
                        KUPI
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="product">
                <h5><a href="#">Ime proizvoda</a></h5>
                <img src="https://placeimg.com/200/300/animals?4" alt="Zivotinja">
                <div class="specs">
                    <span>40.00 KM</span>
                    <a href="/addtocard.php?id=<?php echo $proizvod['id'] ?>" >
                    KUPI
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="product">
                <h5><a href="#">Ime proizvoda</a></h5>
                <img src="https://placeimg.com/200/300/animals?5" alt="Zivotinja">
                <div class="specs">
                    <span>40.00 KM</span>
                    <a href="/addtocard.php?id=<?php echo $proizvod['id']; ?>">
                        KUPI
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="product">
                <h5><a href="#">Ime proizvoda</a></h5>
                <img src="https://placeimg.com/200/300/animals?6" alt="Zivotinja">
                <div class="specs">
                    <span>40.00 KM</span>
                    <a href="/admin/update.php?id=<?php echo $proizvod['id'] ?>" class="delete">


                        +66666

                    <a href="/addtocard.php?id=<?php echo $proizvod['id'] ?>" >
                        KUPI
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>