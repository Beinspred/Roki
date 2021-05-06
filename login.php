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
        Prijava korisnika
    </title>
</head>
<body>

<h1>Login</h1>

<form action="/login.inc.php" method="post">
    <input type="text" name="username" placeholder="Korisnicko ime">
    <input type="password" name="password" placeholder="Lozinka">
    <button>Prijavi se</button>
</form>
<p>
    Ukoliko niste registrovani korisnik, mozete se registrovati  <a href="/signup.php"> ovdje</a>
</p>

</body>

</html>