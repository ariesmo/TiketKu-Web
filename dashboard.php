<?php 
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
        <title>Dashboard Admin TiketKU</title>
        <meta charset="UTF-8">
        <meta name="description" content="Dashboard TiketKu Admin">
        <meta name="keywords" content="TiketKu, Web Dashboard TiketKu, Login TiketKu">
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
                    <div class="item-menu">
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
                    <div class="item-menu inactive">
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
                            <li class="active-link">My Dashboard</li>
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
                            <li>Account Settings</li>
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
                    <p class="header-title">My Dashboard</p>
                    <p class="subheader-title">Latest report updated this week and on</p>
                </div>
            </div>
            <div class="row report-group">
                <div class="col-md-4">
                    <div class="item-report col-md-12">
                        <div class="row">
                            <div class="content col-md-12">
                                <img src="images/icon_total_pengguna.png" alt="">
                                <p class="title-item">TOURIST</p>
                                <p class="subtitle-item">USERS LIFETIME</p>
                                <p class="value-item"><?= count($checkdata_users);?></p>
                                <p class="desc-item">around the earth</p>
                            </div>
                        </div>    
                     </div>     
                </div>
                <div class="col-md-4">
                    <div class="item-report col-md-12">
                        <div class="row">
                            <div class="content col-md-12">
                                <img src="images/icon_total_sales.png" alt="">
                                <p class="title-item">SALES</p>
                                <p class="subtitle-item">TICKETS BEING SOLD</p>
                                <p class="value-item"><?= count($checkdata_tickets); ?></p>
                                <p class="desc-item">around the earth</p>
                            </div>
                        </div>   
                    </div>   
                </div>
                <div class="col-md-4">
                    <div class="item-report col-md-12">
                        <div class="row">
                            <div class="content col-md-12">
                                <img src="images/icon_total_wisata.png" alt="">
                                <p class="title-item">WISATA</p>
                                <p class="subtitle-item">PLACE THAT AVAILABLE</p>
                                <p class="value-item"><?= count($checkdata_wisata);?></p>
                                <p class="desc-item">around the earth</p>
                            </div>
                        </div>      
                    </div>
                </div>
            </div>
            <div class="row report-group">
                <div class="col-md-6">
                    <div class="item-big-report col-md-12">
                         <p class="title"><span class="title-blue">NEWEST </span>USERS</p>
                         <p class="subtitle">USER THAT SIGN UP NOWADAYS</p>
                         <a type="submit" class="btn btn-small btn-primary-tiketku">See More</a>
                         <div class="divider-line"></div> 

                        <?php foreach($checkdata_users as $data_user_tours) {  ?>
                            
                         <div class="user-item">
                            <div class="user-picture">
                                <img src="<?= $data_user_tours['url_photo_profile'];?>" alt="">
                            </div>
                            <p class="title"><?= $data_user_tours['nama_lengkap'];?></p>
                            <p class="subtitle"><?= $data_user_tours['bio'];?></p>
                            <a type="submit" class="btn btn-small-border btn-primary">View Detail</a>
                        </div> 

                        <?php } ?>
                    </div>    
                </div>
                <div class="col-md-6">
                    <div class="item-big-report col-md-12">
                         <p class="title"><span class="title-blue">TICKETS </span>SOLD</p>
                         <p class="subtitle">USERS JUST BOUGHT TICKET</p>
                         <a type="submit" class="btn btn-small btn-primary-tiketku">See More</a>
                         <div class="divider-line"></div> 

                         <?php
                         foreach($checkdata_tickets as $data_ticket_sold => $data_print_value){
                            
                            $data_users_path = 'Users/'.$data_ticket_sold;
                            $reference_users = $database->getReference($data_users_path)->getValue();
                         
                         ?>

                         <div class="user-item col-md-12">
                            <div class="user-picture">
                                <img src="<?= $reference_users['url_photo_profile'];?>" alt="">
                            </div>
                            <p class="title"><?= $reference_users['nama_lengkap'];?></p>
                            <p class="subtitle"><?= $reference_users['bio'];?></p>
                            <a type="submit" class="btn btn-small-border btn-primary">View Profile</a>
                        </div> 
                         <?php } ?>
                    </div>    
                </div>
            </div>
        </div>

        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>