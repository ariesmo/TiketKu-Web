<?php 
include 'includes/user_token.php';
include 'includes/data_model.php';
include 'includes/myfirebase.php';

//ambil url
$username_url = $_GET['name'];

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
$reference_wisata_path = 'Wisata/'.$username_url;
$checkdata_wisata = $database->getReference($reference_wisata_path)->getValue();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sales Page TiketKu</title>
        <meta charset="UTF-8">
        <meta name="description" content="Manage Wisata Detail">
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
                                <p class="header-title">Monas</p>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                                        <li class="breadcrumb-item" style="color: #c7c7c7;"><a href="wisata.php">Wisata</a></li>
                                        <li class="breadcrumb-item active" style="color: #21272C;" aria-current="page">Details Wisata</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="row report-group">
                            <div class="item-big-report col-md-12">
                                <div class="row">
                                    <div class="overlay-box col-md-4">
                                        <a href="#" id="open_file" onclick="bukafile()" class="btn btn-primary btn-third-tiketku">Replace</a>
                                    </div>
                                    <div style="padding-left: 30px;" class="thumbnail-box col-md-4">
                                        <p class="label-thumbnail">Thumbnail Wisata</p>
                                        <img class="thumbnail-wisata" src="<?= $checkdata_wisata['url_thumbnail'];?>" alt="">
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <form action="includes/data_model.php" method="POST">
                                            <div class="form-group content-sign-in">
                                                <label class="title-input-type-primary-tiketku" for="exampleInputNama">Nama Wisata</label>
                                                <input type="text" class="form-control input-type-primary-tiketku" name="nama_wisata" value="<?= $checkdata_wisata['nama_wisata'];?>" id="exampleInputNama" aria-describedby="emailHelp" placeholder="Enter Nama" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="title-input-type-primary-tiketku" for="exampleInputLokasi">Lokasi</label>
                                                <input type="text" class="form-control input-type-primary-tiketku" name="lokasi" value="<?= $checkdata_wisata['lokasi'];?>" id="exampleInputLokasi" placeholder="Enter Lokasi">
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-4">
                                                        <label class="title-input-type-primary-tiketku" for="exampleInputHarga">Harga Tiket (US $)</label>
                                                        <input type="number" class="form-control input-type-primary-tiketku-double" name="harga_tiket" value="<?= $checkdata_wisata['harga_tiket'];?>" id="exampleInputHarga" placeholder="Enter Tiket">
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <label class="title-input-type-primary-tiketku" for="exampleInputTanggal">Tanggal Wisata</label>
                                                        <input type="text" class="form-control input-type-primary-tiketku-double" name="date_wisata" value="<?= $checkdata_wisata['date_wisata'];?>" id="exampleInputTanggal">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="title-input-type-primary-tiketku" for="validationKetentuan">Ketentuan</label>
                                                <textarea class="form-control" style="font-family: 'Montserrat'; font-size: 16px;" name="ketentuan" id="validationKetentuan" placeholder="Enter Ketentuan"><?= $checkdata_wisata['ketentuan'];?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="title-input-type-primary-tiketku" for="validationDescription">Short Description</label>
                                                <textarea class="form-control" style="font-family: 'Montserrat'; font-size: 16px;" name="short_desc" id="validationDescription" placeholder="Enter Description"><?= $checkdata_wisata['short_desc'];?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationTooltip01">has Wifi?</label>
                                                        <input type="text" class="form-control" name="is_wifi" value="<?= $checkdata_wisata['is_wifi'];?>" id="validationTooltip01" placeholder="Enter value" required>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationTooltip02">has Spot?</label>
                                                        <input type="text" class="form-control" name="is_photo_spot" value="<?= $checkdata_wisata['is_photo_spot'];?>" id="validationTooltip02" placeholder="Enter value" required>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationTooltip02">has Festival?</label>
                                                        <input type="text" class="form-control" name="is_festival" value="<?= $checkdata_wisata['is_festival'];?>" id="validationTooltip02" placeholder="Enter value" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style=" margin-bottom:-40px; visibility: hidden;" class="form-group content-sign-in">
                                                <input id="image_file" type="file">
                                            </div>
                                            <input type="hidden" name="name_wisataurl" value="<?= $username_url; ?>">
                                            <button name="update" type="submit" class="btn btn-primary btn-primary-tiketku">Update</button>
                                            <button style="margin-left: 10px;" type="reset" class="btn btn-primary btn-secondary-tiketku">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>   
                        </div>
                </div>

        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    </body>
</html>