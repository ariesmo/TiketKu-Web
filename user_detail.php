<?php 
include 'includes/user_token.php';
include 'includes/data_model.php';
include 'includes/myfirebase.php';

//ambil url
$username_url = $_GET['username'];

//ambil data admin
$reference = 'Admin/'.$_SESSION['username'];
$checkdata = $database->getReference($reference)->getValue();

//ambil data users
$reference_users_path = 'Users/'.$username_url;
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
                            <img src="<?= $checkdata_users['url_photo_profile'];?>" height="29" alt="">
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
                            <div class="item-menu">
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
                            <img src="<?= $checkdata_users['url_photo_profile'];?>" alt="">
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
                                    <li class="active-link">Customers <span class="badge-tiketku badge badge-pill badge-primary">96</span></li>
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
                                <p class="header-title">Add New Customer</p>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                                        <li class="breadcrumb-item" style="color: #c7c7c7;"><a href="customer.php">Customers</a></li>
                                        <li class="breadcrumb-item active" style="color: #21272C;" aria-current="page">Create</li>
                                    </ol>
                                </nav>
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
                                                                <img src="<?= $checkdata_users['url_photo_profile'];?>" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-add-new row">
                                                        <div class="col-md-12">
                                                            <form action="includes/data_model.php" method="POST">
                                                                <div class="form-group content-sign-in">
                                                                    <label class="title-input-type-primary-tiketku" for="exampleInputNama">Username</label>
                                                                    <input type="text" class="form-control input-type-primary-tiketku-detail" value="<?= $checkdata_users['username'];?>" name="username" id="exampleInputNama" aria-describedby="emailHelp" placeholder="Enter Username" disabled>
                                                                </div>
                                                                <div class="form-group content-sign-in">
                                                                    <label class="title-input-type-primary-tiketku" for="exampleInputNama">Nama Pengguna</label>
                                                                    <input type="text" class="form-control input-type-primary-tiketku-detail" value="<?= $checkdata_users['nama_lengkap'];?>" name="nama_lengkap" id="exampleInputNama" aria-describedby="emailHelp" placeholder="Enter Nama">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="title-input-type-primary-tiketku" for="exampleInputLokasi">Alamat Email</label>
                                                                    <input type="email" class="form-control input-type-primary-tiketku-detail" value="<?= $checkdata_users['email_address'];?>" name="email_address" id="exampleInputLokasi" placeholder="Email">
                                                                </div>
                                                                <div class="form-group">
                                                                        <label class="title-input-type-primary-tiketku" for="exampleInputLokasi">Kata Sandi</label>
                                                                        <input type="password" class="form-control input-type-primary-tiketku-detail" value="<?= $checkdata_users['password'];?>" name="password" id="exampleInputLokasi" placeholder="Password">
                                                                    </div>
                                                                <div class="form-group">
                                                                    <div class="form-row">
                                                                        <div class="col-md-6 mb-4">
                                                                            <label class="title-input-type-primary-tiketku" for="exampleInputHarga">Bio</label>
                                                                            <input type="text" class="form-control input-type-primary-tiketku-double-detail" value="<?= $checkdata_users['bio'];?>" name="bio" id="exampleInputHarga" placeholder="Bio">
                                                                        </div>
                                                                        <div class="col-md-6 mb-4">
                                                                            <label class="title-input-type-primary-tiketku" for="exampleInputTanggal">Balance (US$)</label>
                                                                            <input type="number" class="form-control input-type-primary-tiketku-double-detail" value="<?= $checkdata_users['user_balance'];?>" name="user_balance" id="exampleInputTanggal" placeholder="Balance" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="username_user_url" value="<?= $username_url; ?>">
                                                                <button name="update_user" type="submit" class="btn btn-primary btn-primary-tiketku">Save Now</button>
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
                                            <form action="includes/data_model.php" method="POST">
                                            <input type="hidden" name="username_user_url" value="<?= $username_url; ?>">
                                            <button name="deleteuser" type="submit" class="btn btn-primary btn-primary-detail" data-toggle="modal" data-target="#exampleModal">Delete User</button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete <?= $checkdata_users['nama_lengkap'];?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin akan dihapus ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger">Save changes</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
        <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script> 
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

    </body>
</html>