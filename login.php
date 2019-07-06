<!DOCTYPE html>
<html>
    <head>
        <title>Sign In Admin TiketKU</title>
        <meta charset="UTF-8">
        <meta name="description" content="Login TiketKu Admin">
        <meta name="keywords" content="TiketKu, Web Dashboard TiketKu, Login TiketKu">
        <meta name="author" content="BWA Team">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/all.css">
    </head>
    <body>
        <div class="container">
            <div class="row header-sign-in">
                <div class="col-12">
                    <img class="logo-header" height="80" src="images/applogocolored.png">
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 form-sign-in">
                    <div class="row">
                        <div class="col-md-6 d-none d-sm-block">
                            <img class="icon-header" height="276" src="images/illustration_login.png" alt="">
                        </div>
                        <div class="col-md-4">
                            <p class="title-form">Sign In</p>
                            <p class="subtitle-form">Let's make a report today</p>
                            <form action="includes/data_model.php" method="POST">
                                <div class="form-group content-sign-in">
                                  <label class="title-input-type-primary-tiketku" for="exampleInputEmail1">Username</label>
                                  <input type="text" name="username" class="form-control input-type-primary-tiketku" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                  <label class="title-input-type-primary-tiketku" for="exampleInputPassword1">Password</label>
                                  <input type="password" name="password" class="form-control input-type-primary-tiketku" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <button type="submit" name="signin" class="btn btn-primary btn-primary-tiketku">Sign In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
    </body>
</html>