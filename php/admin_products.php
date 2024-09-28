<?php

include 'config.php';

session_start();

if (!isset($admin_id)){
    header ('location:login.php');
};

if (isset($_POST['admin_id'])){

    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $price=$_POST['price'];
    $image=$_POST['image'];
    $image_top_name=$_POST['image']['top-name'];
    $image_folder="uploaded_img/.$image";

    
}
?>