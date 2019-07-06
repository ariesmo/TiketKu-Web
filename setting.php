<?php 
// include 'includes/user_token.php';
include 'includes/data_model.php';
include 'includes/myfirebase.php';

session_start();
//ambil data admin
$reference = 'Admin/'.$_SESSION['username'];
$checkdata = $database->getReference($reference)->getValue();

//ambil data users
$reference_users_path = 'Users';
$checkdata_users = $database->getReference($reference_users_path)->getValue();

//ambil data ticket
$reference_tickets_path = 'MyTickets';
$checkdata_tickets = $database->getReference($reference_tickets_path)->getValue();

//ambil data wisata
$reference_wisata_path = 'Wisata';
$checkdata_wisata = $database->getReference($reference_wisata_path)->getValue();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sales Page TiketKu</title>
        <meta charset="UTF-8">
        <meta name="description" content="Sales TiketKu Admin">
        <meta name="keywords" content="TiketKu, Web Sales TiketKu, Login TiketKu">
        <meta name="author" content="BWA Team">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/all.css">
    </head>
    <body>
            <div class="side-left">
                    <div class="shortcut" onmouseover="showAdminProfile()">
                        <div class="emblemapp">
                            <img src="images/emblem_app.png" height="29" alt="">
                        </div>
                        <div class="menus">
                            <div class="item-menu inactive">
                                <a href="dashboard.php">
                                    <p class="icon-item-menu"><i class="fab fa-delicious"></i></p>
                                </a>   
                            </div>
                            <div class="item-menu inactive">
                                <a href="sales.php">
                                    <p class="icon-item-menu"><i class="fas fa-ticket-alt"></i></p>
                                </a>
                            </div>
                            <div class="item-menu inactive">
                                <a href="wisata.php">
                                    <p class="icon-item-menu"><i class="fas fa-globe"></i></p>
                                </a>
                            </div>
                            <div class="item-menu inactive">
                                <a href="customer.php">
                                    <p class="icon-item-menu"><i class="fas fa-users"></i></p>
                                </a>
                            </div>
                            <div class="item-menu">
                                <a href="setting.php">
                                    <p class="icon-item-menu"><i class="fas fa-cog"></i></p>
                                </a>
                            </div>
                            <div class="item-menu inactive">
                                <a href="#">
                                    <p class="icon-item-menu"><i class="fas fa-power-off"></i></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="admin-profile" id="sl_ap" onmouseover="showAdminProfile()" onmouseout="hideAdminProfile()">
                        <div class="admin-picture">
                            <img src="images/photo_profile.jpg" alt="">
                        </div>
                        <p class="admin-name"><?= $checkdata['nama_admin'];?></p>
                            <p class="admin-level">Super Admin</p>
                            <ul class="admin-menus">
                                <a href="dashboard.php">
                                    <li>My Dashboard</li>
                                </a>
                                <a href="sales.php">
                                    <li>Ticket Sales</li>
                                </a>
                                <a href="wisata.php">
                                    <li>Manage Wisata</li>
                                </a>
                                <a href="customer.php">
                                    <li>Customers <span class="badge-tiketku badge badge-pill badge-primary">96</span></li>
                                </a>   
                                <a href="setting.php">
                                    <li class="active-link">Account Settings</li>
                                </a> 
                                <a href="includes/user_destroy.php">
                                    <li style="padding-top: 20px">Log Out</li>
                                </a>  
                            </ul>
                    </div>
                </div>
                <div class="main-content">
                        <div class="header row">
                            <div class="col-md-12">
                                <p class="header-title">Account Settings</p>
                                <p class="subheader-title">Ensure your account is healthy</p>
                            </div>
                        </div>
                        <div class="row report-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                            <div class="item-big-report col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="primary-user-picture-circle">
                                                                <img src="images/photo_profile.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-add-new row">
                                                        <div class="col-md-12">
                                                            <form action="includes/data_model.php" method="POST">
                                                                <div class="form-group content-sign-in">
                                                                    <label class="title-input-type-primary-tiketku" for="exampleInputNama">Nama Admin</label>
                                                                    <input type="text" class="form-control input-type-primary-tiketku-detail" name="nama_admin" value="<?= $checkdata['nama_admin'];?>" id="exampleInputNama" aria-describedby="emailHelp" placeholder="Enter Nama">
                                                                </div>
                                                                <div class="form-group content-sign-in">
                                                                    <label class="title-input-type-primary-tiketku" for="exampleInputNama">Username</label>
                                                                    <input type="text" class="form-control input-type-primary-tiketku-detail" name="username" value="<?= $checkdata['username'];?>" id="exampleInputNama" aria-describedby="emailHelp" placeholder="Enter Username" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="title-input-type-primary-tiketku" for="exampleInputLokasi">Email Address</label>
                                                                    <input type="email" class="form-control input-type-primary-tiketku-detail" name="email_admin" value="<?= $checkdata['email_admin'];?>" id="exampleInputLokasi" placeholder="Email">
                                                                </div>
                                                                <div class="form-group">
                                                                        <label class="title-input-type-primary-tiketku" for="exampleInputLokasi">Password</label>
                                                                        <input type="text" class="form-control input-type-primary-tiketku-detail" name="password" value="<?= $checkdata['password'];?>" id="exampleInputLokasi" placeholder="Password">
                                                                </div>
                                                                
                                                                <input type="hidden" name="username_admin_url" value="<?= $checkdata['username'];?>">
                                                                <button name="update_admin" type="submit" class="btn btn-primary btn-primary-tiketku">Update</button>
                                                                <a href="customer.php" style="margin-left: 10px;"class="btn btn-primary btn-secondary-tiketku">Cancel</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="item-danger-zone col-md-12">
                                            <p style="margin-bottom: 10px;" class="title">Danger Zone</p>
                                            <p class="subtitle">You are able to delete the user and once you deleted it -- it is gone</p>
                                            <a href="includes/delete_admin.php?username=<?= $checkdata['username'];?>" type="submit" class="btn btn-primary btn-primary-detail">Delete User</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>