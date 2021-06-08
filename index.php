<?php
ini_set('display_errors', 'On');
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require_once('./connections_database.php');

$select = "SELECT  id, ime_proizvoda, cijena, opis_proizvoda, kolicina, slika FROM products";
$rezultat = $conn ->query($select);
$proizvodi =[];

if($rezultat->num_rows > 0){
    while ($row = $rezultat->fetch_assoc()){
        $proizvodi []= $row;
    }
}

$widget = "SELECT id,ime_proizvoda,visitor_counter FROM products ORDER BY visitor_counter DESC limit 3";
$widget_ = $conn->query($widget);
$pregledi =[];

if($widget_->num_rows > 0){
    while ($row1 = $widget_->fetch_assoc()){
        $pregledi []= $row1;
    }

}


$top_sell = "SELECT SUM(i.kolicina) AS suma, i.produts_id, p.ime_proizvoda FROM orders_items AS i INNER JOIN products AS p ON p.id = i.produts_id GROUP BY i.produts_id  order by suma DESC LIMIT 3";
$top_sell_ = $conn->query($top_sell); // jebeni sql string
$prodaja = [];

if ($top_sell_->num_rows > 0) {
    while ($rows = $top_sell_->fetch_assoc()) {
        $prodaja [] = $rows;
    }
}


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

<div class="top_sell">
    <table>
        <tbody>
        <tr>
            <th>Najvise prodavani proizvodi</th>
        </tr>
        <tr>
            <?php foreach ($prodaja as $sell): ?></tr>
                <td><?php echo $sell['ime_proizvoda']; ?></td>
                <td><?php echo $sell['suma']; ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
        <tr>
            <br>
            <br>
            <th>Najvise pregledani proizvodi</th>
        </tr>
        <tr>
            <?php foreach ($pregledi as $view): ?></tr>

            <td><?php echo $view['ime_proizvoda'];  ?></td>
                <td><?php echo $view['visitor_counter']; ?></td>
            <?php endforeach; ?>
        </tr>
        </tbody>
    </table>
</div>


<div class="container">
    <div class="row">
        <div class="col-h">
            <h1>Roki </h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <?php foreach ($proizvodi as $proizvod): ?>
            <div class="col">
                <div class="product">
                    <h5>
                        <a href="/product_page.php?id=<?php echo $proizvod['id']; ?>"><?php echo $proizvod['ime_proizvoda']; ?> </a>
                    </h5>
                    <?php if (!empty($proizvod['slika'])) : ?>
                        <img src="<?php echo $proizvod['slika']; ?>" alt="<?php echo $proizvod['ime_proizvoda']; ?> ">
                    <?php endif; ?>
                    <?php echo $proizvod['opis_proizvoda']; ?>

                    <div class="specs">
                        <span> <?php echo $proizvod['id'] ?> KM</span>
                        <a href="/addtocard.php?id=<?php echo $proizvod['id'] ?>">
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