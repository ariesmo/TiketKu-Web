<?php
// include 'user_token.php';
include 'myfirebase.php';

if(isset($_POST['signin'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if($username != null){
        if($password != null){
            $reference = 'Admin/'.$username;
            $checkdata = $database->getReference($reference)->getValue();
            if($checkdata != null){
                if($password != null){
                    $password_admin = $checkdata['password'];
                    // echo $password_admin;
                    if($password == $password_admin){
                        header('Location:../dashboard.php');
                        session_start();
                        $_SESSION['username'] = $username;
                    } else {
                        echo "Password Salah";
                    }
                  
                } else {
                    echo "Password Salah";
                }
            } else {
                echo 'Data Tidak Ada';
            }
        }
    }
} else if(isset($_POST['update'])){
    $nama_wisataurl = $_POST['name_wisataurl'];
   
    $nama_wisata = $nama_wisataurl;
    $lokasi = htmlspecialchars($_POST['lokasi']);
    $harga_tiket = htmlspecialchars($_POST['harga_tiket']);
    $date_wisata = htmlspecialchars($_POST['date_wisata']);
    $ketentuan = htmlspecialchars($_POST['ketentuan']);
    $short_desc = htmlspecialchars($_POST['short_desc']);
    $is_wifi = htmlspecialchars($_POST['is_wifi']);
    $is_photo_spot = htmlspecialchars($_POST['is_photo_spot']);
    $is_festival = htmlspecialchars($_POST['is_festival']);

    $reference = 'Wisata/'.$nama_wisata;

    $data = [
        'nama_wisata' => $nama_wisata,
        'lokasi' => $lokasi,
        'harga_tiket' => $harga_tiket,
        'date_wisata' => $date_wisata,
        'ketentuan' => $ketentuan,
        'short_desc' => $short_desc,
        'is_wifi' => $is_wifi,
        'is_photo_spot' => $is_photo_spot,
        'is_festival' => $is_festival
    ];

    $checkdata = $database->getReference($reference)->update($data);

    header('Location:../wisata.php');
} else if(isset($_POST['update_user'])){
    $nama_userurl = $_POST['username_user_url'];
   
    $username = $nama_userurl;
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $email_address = htmlspecialchars($_POST['email_address']);
    $password = htmlspecialchars($_POST['password']);
    $bio = htmlspecialchars($_POST['bio']);
    $user_balance = htmlspecialchars($_POST['user_balance']);
    
    $reference = 'Users/'.$username;

    $data = [
        'username' => $username,
        'nama_lengkap' => $nama_lengkap ,
        'email_address' => $email_address,
        'password' => $password,
        'bio' => $bio,
        'user_balance' => $user_balance
    ];

    $checkdata = $database->getReference($reference)->update($data);

    header('Location:../customer.php');
} else if(isset($_POST['deleteuser'])){
    $nama_userurl = $_POST['username_user_url'];
   
    $username = $nama_userurl;    
    $reference = 'Users/'.$username;
    $reference_ticket = 'MyTickets/'.$username;

    $checkdata = $database->getReference($reference)->remove();
    $checkdata_ticket = $database->getReference($reference_ticket)->remove();

    header('Location:../customer.php');
} else if(isset($_POST['adduser'])){
   
   
    $username = htmlspecialchars($_POST['username']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $email_address = htmlspecialchars($_POST['email_address']);
    $password = htmlspecialchars($_POST['password']);
    $bio = htmlspecialchars($_POST['bio']);
    $user_balance = htmlspecialchars($_POST['user_balance']);
    
    $reference = 'Users/'.$username;

    $data = [
        'username' => $username,
        'nama_lengkap' => $nama_lengkap,
        'email_address' => $email_address,
        'password' => $password,
        'bio' => $bio,
        'user_balance' => $user_balance
    ];

    $checkdata = $database->getReference($reference)->set($data);

    header('Location:../customer.php');
} else if(isset($_POST['update_admin'])){
    $nama_adminurl = $_POST['username_admin_url'];
   
    $username = $nama_adminurl;
    $nama_admin = htmlspecialchars($_POST['nama_admin']);
    $email_admin = htmlspecialchars($_POST['email_admin']);
    $password = htmlspecialchars($_POST['password']);
    
    $reference = 'Admin/'.$username;

    $data = [
        'username' => $username,
        'nama_admin' => $nama_admin,
        'email_admin' => $email_admin,
        'password' => $password
    ];

    $checkdata = $database->getReference($reference)->update($data);

    header('Location:../dashboard.php');
}
