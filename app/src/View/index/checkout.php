<?php  /** @var array $data */?>

<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
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

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: (232,240,254);
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: (232,240,254);
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .sumbit {
            background-color: dodgerblue;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #white;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="kupac">
    <p>Popunite podatke za dostavu</p>

    <hr>
    <form  method="post">

    <label for="ime"><b>Ime i prezime</b></label>
    <input type="text" placeholder="Unesite Vase ime i prezime" name="name" id="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="telefon"><b>Broj telefona</b></label>
    <input type="text" placeholder="Unesite broj telefona" name="telefon" id="telefon" required>

    <label for="adresa"><b>Adresa</b></label>
    <input type="text" placeholder="Unesite adresu i broj ulice" name="address" id="address" required>

    <label for="grad"><b>Grad</b></label>
    <input type="text" placeholder="Unesite grad i postanski broj" name="city" id="city" required>

    <label for="napomene"><b>Dodatne napomene</b></label>
    <input type="text" placeholder="Dodatne napomene" name="napomene" id="napomene">

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="sumbit" id="sumbit">Naruci</button>
    </form>
</div>

<div class="container signin">
    <div class="col">
        <a href="/user/login" class="btn btn-light btn-block">Imas nalog?</a>
    </div>
    <p>Nemas nalog? <a href="/user/register">Registruj se</a>.</p>
</div>
</form>
</div>
</body>
</html>