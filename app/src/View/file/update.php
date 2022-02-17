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
        Update file
    </title>
</head>
<body>
<h1>Update file</h1>

<form action="/file/update/<?php echo $data['id'];?>"method="post">
    <input type="text" name="name" placeholder="Name File" value="<?php echo $data['name']; ?>">
    <button type="submit" name="submit">Update</button>
</form>

</body>

</html>