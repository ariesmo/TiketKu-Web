<?php
include 'myfirebase.php';

$username_admin_url = $_GET['username'];

$reference = 'Admin/'.$username_admin_url;
$checkdata = $database->getReference($reference)->remove();

header('Location:user_destroy.php');
?>