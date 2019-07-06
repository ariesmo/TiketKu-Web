<?php 
include 'includes/user_token.php';
include 'includes/data_model.php';
include 'includes/myfirebase.php';

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
                            <div class="item-menu">
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
                                    <li>My Dashboard</li>
                                </a>
                                <a href="sales.php">
                                    <li class="active-link">Ticket Sales</li>
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
                                <p class="header-title">Ticket Sales</p>
                                <p class="subheader-title">The items are bought around the world</p>
                            </div>
                        </div>
                        <div class="row report-group">
                            <div class="col-md-12">
                                <div class="item-big-report col-md-12">
                                    <table class="table-tiketku table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Picture</th>
                                                <th scope="col">Nama User</th>
                                                <th scope="col">Jumlah Wisata</th>
                                                <th scope="col">Sisa Balance</th>
                                                <th scope="col">Menu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($checkdata_tickets as $data_ticket_sales => $data_print_sales){
                                                $data_users_path = 'Users/'.$data_ticket_sales;
                                                $reference_users = $database->getReference($data_users_path)->getValue();
                                            
                                                $data_ticket_places = 'MyTickets/'.$reference_users['username'].'/wisata';
                                                $reference_places = $database->getReference($data_ticket_places)->getValue();
                                               
                                            ?>
                                            <tr>
                                                <td scope="row user-table-item">
                                                    <img class="user-table-item" src="images/photo_profile.jpg" alt="">
                                                </td>
                                                <td><?= $reference_users['nama_lengkap'];?></td>
                                                <td><?= count($reference_places);?> Place</td>
                                                <td>US $<?= $reference_users['user_balance'];?></td>
                                                <td>
                                                    <a href="sales_detail.php?id=<?= $reference_users['username'];?> "type="submit" class="btn btn-small-table btn-primary">Details</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table> 
                                </div>    
                            </div>
                        </div>
                    </div>

        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>