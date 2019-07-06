<?php 
include 'includes/user_token.php';
include 'includes/data_model.php';
include 'includes/myfirebase.php';

$username_url = $_GET['id'];

//ambil data admin
$reference = 'Admin/'.$_SESSION['username'];
$checkdata = $database->getReference($reference)->getValue();

//ambil data users
$reference_users_path = 'Users/'.$username_url;
$checkdata_users = $database->getReference($reference_users_path)->getValue();

//ambil data ticket
$reference_tickets_path = 'MyTickets/'.$username_url.'/wisata';
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
                                <p class="header-title">Details</p>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                                        <li class="breadcrumb-item" style="color: #c7c7c7;"><a href="sales.php">Sales</a></li>
                                        <li class="breadcrumb-item active" style="color: #21272C;" aria-current="page"><?= $checkdata_users['nama_lengkap'];?></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="row report-group">
                            <div class="col-md-12">
                                <div class="item-big-report col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="primary-user-picture-circle">
                                                <img src="images/photo_profile.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="sales-title"><?= $checkdata_users['nama_lengkap'];?></p>
                                            <p class="sales-subtitle"><?= $checkdata_users['bio'];?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="sales-subtitle-total">Total Balance : <span class="sales-subtitle-balance">US$ <?= $checkdata_users['user_balance'];?></span></p>
                                        </div>
                                    </div>
                                    <div class="row user-wisata-places">
                                        <div class="col-md-12">
                                            <p class="sales-title"><?= $checkdata_users['nama_lengkap'];?>'s Wisata</p>
                                        </div>
                                        <?php 
                                        foreach($checkdata_tickets as $data_ticket_sales => $data_print_sales){
                                            $reference_tickets_path = 'MyTickets/'.$username_url.'/wisata/'.$data_ticket_sales;
                                            $checkdata_sales_wisata = $database->getReference($reference_tickets_path)->getValue();
                                            
                                            $reference_wisata_name = 'Wisata/'.$checkdata_sales_wisata['nama_wisata'];
                                            $checkdata_wisata_name = $database->getReference($reference_wisata_name)->getValue();
    
                                        ?>
                                        <div class="item-wisata-places col-md-4">
                                            <img src="<?= $checkdata_wisata_name['url_thumbnail'];?>" alt="">
                                            <p class="sales-title-wisata"><?= $checkdata_wisata_name['nama_wisata'];?></p>
                                            <p class="sales-subtitle-wisata"><?= $checkdata_wisata_name['lokasi'];?></p>
                                        </div>
                                        <?php } ?>
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