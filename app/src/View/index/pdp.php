<?php  /** @var array $data */?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
body {

    display: block;
    color: #121314;
    font-size: 18px;
    line-height: 28px;
    letter-spacing: 0.3px;
    margin-top: 2px;
    margin-bottom: 2px;
    font-family: "MangoSans",sans-serif;
    font: 13px;
}

.split {
    height: 100%;
    width: 50%;
    position: fixed;
    z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;

}

.left {
    left: 0;
    background-color: #rgba(255, 255, 255, 0.5);

}

.right {
    right: 0;
    background-color: rgba(255, 255, 255, 0.5);

}

.centered {
    position: relative;
    right: 0;
    z-index: 2;
    float: left;
    min-width: 600px;
    height: auto;
    width: 60%;
    padding: 56px;
}

.centered img {

    float: left;
    width: calc(50% - 1px);
}
.container {
    width: 900px;
    margin: auto;
}

.row {
    display: flex;
    flex-wrap: wrap;
}

.col {
    width: 25%;
}

/*.col-20 {*/
/*    width: 20%;*/
/*}*/

.col-80 {
    width: 100%;
}

.product h5 {text-align: center;}

.product-detail h5 {
    text-align: left;
}

.product img {
    width: 80%;
    margin: auto;
    display: block;
}

.product .specs a,
.product-detail a.buy {
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

.product:hover .specs a,
.product-detail:hover a.buy {
    background: orange;
    color: red;
}

.product .specs:hover a,
.product-detail h5:hover a.buy {
    background: yellow;
    color: orange;
}

.product .specs a:hover,
.product-detail a.buy:hover {
    background: white;
    color: red;
}

.cart {
    position: fixed;
    right: 5px;
    top: 5px;
    padding: 6px 11px;
    border-radius: 30px;
}
.cart:hover>svg>path {
    stroke: white;
}

.cart>svg>path {
    transition: stroke .4s;
}

.cart {
    transition: background .4s;
}

.cart:hover {
    background: black;
}
</style>
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

<div class="split left">
  <div class="centered">
    <img src="https://st.mngbcn.com/rcs/pics/static/T2/fotos/outfit/S20/27964761_20-99999999_01.jpg?ts=1642169156699&imwidth=476&imdensity=2" alt="Avatar woman">
      <img src="https://st.mngbcn.com/rcs/pics/static/T2/fotos/outfit/S20/27964761_20-99999999_01.jpg?ts=1642169156699&imwidth=476&imdensity=2" alt="Avatar woman">
      <img src="<?php echo $data['slika'] ?>" alt="<?php echo $data['ime_proizvoda'] ?>">

  </div>
</div>

<div class="split right">
  <div class="centered">

      <a class="cart" href="/checkout">
          <svg width="30" height="30" viewBox="0 0 128 128" fill="none" >
              <path d="M8 8H19C19 8 19.941 16.2521 21.1896 27M21.1896 27C23.2225 44.4994 26.0707 68.6147 27 74.5C28.5 84 29.5 84 37 84H97.5C103.398 83.3094 105.275 80.9491 107 74.5L115.5 34C116.047 27.7841 113.437 26.9255 107 27H21.1896Z" stroke="#000000" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M49 108.5C49 113.194 45.1944 117 40.5 117C35.8056 117 32 113.194 32 108.5C32 103.806 35.8056 100 40.5 100C45.1944 100 49 103.806 49 108.5ZM97 108.5C97 113.194 93.1944 117 88.5 117C83.8056 117 80 113.194 80 108.5C80 103.806 83.8056 100 88.5 100C93.1944 100 97 103.806 97 108.5Z" stroke="#000000" stroke-width="8"/>
          </svg>
      </a>
      <div class="container">
          <div class="row">
              <div class="col-h">

                  <h1><?php echo $data['ime_proizvoda']; ?></h1>
                  <hr>
              </div>
          </div>
          <div class="row">
              <div class="col-20">
                  <div class="product">

                  </div>
              </div>
              <div class="col-80">
                  <div class="product-detail">
                      <h5>
                          <span><?php echo $data['cijena'] ?> KM</span>
                          <a href="/addtocart/<?php echo $data['id'] ?>"  class="buy">
                              KUPI
                          </a>
                      </h5>
                      <div class="description">
                          <p><?php echo $data['opis_proizvoda']?></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


</body>
</html>

