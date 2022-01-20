<?php  /** @var array $data */ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="/fonts/material-design-iconic-font/css/material-design-iconic-font.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>


<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Login</h2> <br>
            <br>

            <br>

            <form action="/user/login/"   method="post">
                <div class="form-group">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg" value="<?php echo $data['name']; ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg " value="<?php echo $data['password']; ?>">

                </div>
                <br>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="/user/register" class="btn btn-light btn-block">Nemate nalog?</a>
                    </div>
                </div>

        </div>
        </form>
    </div>
</div>
</div>
</html>