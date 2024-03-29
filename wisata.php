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
        <meta name="description" content="Manage Wisata">
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
                            <div class="item-menu">
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
                                    <li>Ticket Sales</li>
                                </a>
                                <a href="wisata.php">
                                    <li class="active-link">Manage Wisata</li>
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
                            <p class="header-title">Manage Wisata</p>
                            <p class="subheader-title">The Place where the products were born</p>
                        </div>
                    </div>
                    <div class="row report-group">
                        <div class="item-big-report col-md-12">
                            <table class="table-tiketku table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama Wisata</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Harga Tiket</th>
                                        <th scope="col">Menu</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach($checkdata_wisata as $data_wisata_title => $data_wisata_value){        
                                    ?>
                                    <tr>
                                        <td><?= $data_wisata_value['nama_wisata'];?></td>
                                        <td><?= $data_wisata_value['lokasi'];?></td>
                                        <td><?= $data_wisata_value['date_wisata'];?></td>
                                        <td>US $<?= $data_wisata_value['harga_tiket'];?></td>
                                        <td>
                                            <a href="manage_wisata.php?name=<?=$data_wisata_value['nama_wisata'];?>" type="submit" class="btn btn-small-table btn-primary">Details</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table> 
                        </div>    
                    </div>
                </div>

        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>