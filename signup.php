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
    <title> Registracija korisnika</title>
</head>
<body>
<h1> Registracija korisnika</h1>

<form action="/signup.inc.php" method="post">
    <input type="text" name="name" placeholder="Ime">
    <input type="text" name="last_name" placeholder="Prezime">
    <input type="text" name="username" placeholder="Korisnicko ime">
    <input type="text" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Lozinka">
    <button type="submit">Kreiraj korisnika</button>

</form>
</body>
</html>