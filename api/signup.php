<?php
require_once '../database/connect.php';

if (isset($_REQUEST['name']) && isset($_REQUEST['email']) && isset($_REQUEST['password']) && isset($_REQUEST['address']) && $_REQUEST['image'] && isset($_REQUEST['imagename'])) {
    $digits = 7;
    $UID = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
    $check = $db->query("SELECT * FROM `Employee` WHERE `ID` = $UID");
    while (true) {
        if (mysqli_num_rows($check) == 0) {
            break;
        }
        $UID = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $check = $db->query("SELECT * FROM `Employee` WHERE `ID` = $UID");
    }
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $address = $_REQUEST['address'];
    $image = $_REQUEST['imagename'];

    $img = $_REQUEST["image"];
    $comm = "wget " . $img . " -P ../img/";
    shell_exec($comm);
    $sql = "INSERT INTO `Employee`(`ID`,`emp_Name`, `emp_Email`, `emp_Password`, `Address`, `emp_img`) VALUES ('$UID','$name','$email','$password','$address','$image')";
    $result = $db->query($sql);
    echo $UID;
}