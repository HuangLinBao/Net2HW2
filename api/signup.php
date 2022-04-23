<?php
require_once '../database/connect.php';

if (isset($_REQUEST['name']) && isset($_REQUEST['email']) && isset($_REQUEST['password']) && isset($_REQUEST['address']) && $_REQUEST['image'] && isset($_REQUEST['imagename'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $address = $_REQUEST['address'];
    $image = $_REQUEST['imagename'];
    //decode base64 string
    $img = $_REQUEST["image"];
    $comm = "wget " . $img . " -P ../img/";
    shell_exec($comm);
    $sql = "INSERT INTO `Employee`(`emp_Name`, `emp_Email`, `emp_Password`, `Address`, `emp_img`) VALUES ('$name','$email','$password','$address','$image')";
    $result = $db->query($sql);
    echo "SUCCESS!";
}