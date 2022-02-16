<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registracija </title>
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
            <h2>Create An Account</h2> <br>
            <br>

            <p>Please fill out this form to register with us</p>
            <br>

            <form action="/user/register" method="post">
                <div class="form-group">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($properties['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $properties['name']; ?>">
                    <span class="invalid-feedback"><?php echo $properties['name_err']; ?></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($properties['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $properties['email']; ?>">
                    <span class="invalid-feedback"><?php echo $properties['email_err']; ?></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($properties['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $properties['password']; ?>">
                    <span class="invalid-feedback"><?php echo $properties['password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($properties['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $properties['confirm_password']; ?>">
                </div>
                <br>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="/user/login" class="btn btn-light btn-block">Imate nalog?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</html>