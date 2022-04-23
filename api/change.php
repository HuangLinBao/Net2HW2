<?php
require_once '../database/connect.php';

if (isset($_REQUEST['name']) && isset($_REQUEST['id'])) {
    $name = $_REQUEST['name'];
    $employee_id = $_REQUEST['id'];
    $sql = "UPDATE `Employee` SET `emp_Name` = '$name' WHERE `ID` = $employee_id";
    $result = $db->query($sql);
    $fetchSql = "SELECT * FROM `Employee` WHERE `ID` = $employee_id";
    $fetchResult = $db->query($fetchSql);
    $employees = [];
    while ($row = $fetchResult->fetch_assoc()) {
        $employees[] = $row;
    }
    echo $employees[0]['emp_Name'];
}


//change employee email
if (isset($_REQUEST['email']) && isset($_REQUEST['id'])) {
    $email = $_REQUEST['email'];
    $employee_id = $_REQUEST['id'];
    $sql = "UPDATE `Employee` SET `emp_Email` = '$email' WHERE `ID` = $employee_id";
    $result = $db->query($sql);
    $fetchSql = "SELECT * FROM `Employee` WHERE `ID` = $employee_id";
    $fetchResult = $db->query($fetchSql);
    $fetchEmployees = [];
    while ($row = $fetchResult->fetch_assoc()) {
        $fetchEmployees[] = $row;
    }
    echo  $fetchEmployees[0]['emp_Email'];
}


if (isset($_REQUEST['password']) && isset($_REQUEST['id'])) {
    $password = $_REQUEST['password'];
    $employee_id = $_REQUEST['id'];
    $sql = "UPDATE `Employee` SET `emp_Password` = '$password' WHERE `ID` = $employee_id";
    $result = $db->query($sql);
    echo "Password Changed";
}

//change address to employee
if (isset($_REQUEST['address']) && isset($_REQUEST['id'])) {
    $address = $_REQUEST['address'];
    $employee_id = $_REQUEST['id'];
    $sql = "UPDATE `Employee` SET `Address` = '$address' WHERE `ID` = $employee_id";
    $result = $db->query($sql);
    $fetchSql = "SELECT * FROM `Employee` WHERE `ID` = $employee_id";
    $fetchResult = $db->query($fetchSql);
    $fetchEmployees = [];
    while ($row = $fetchResult->fetch_assoc()) {
        $fetchEmployees[] = $row;
    }
    echo  $fetchEmployees[0]['Address'];
}

//change imgae for employee 
if (isset($_REQUEST['image']) && isset($_REQUEST['id'])) {
    $imgUrl = $_REQUEST['image'];
    $UrlArr = explode("/", $imgUrl);
    $image = $UrlArr[count($UrlArr) - 1];
    $employee_id = $_REQUEST['id'];
    $tmpSql = "SELECT * FROM `Employee` WHERE `ID` = $employee_id";
    $tmpResult = $db->query($tmpSql);
    $tmpEmployees = [];
    while ($row = $tmpResult->fetch_assoc()) {
        $tmpEmployees[] = $row;
    }
    $tmpImg = $tmpEmployees[0]['emp_img'];
    $rmCommand = "rm ../img/$tmpImg";
    $wCommand = "wget " . $imgUrl . " -P ../img/";
    shell_exec($rmCommand);
    shell_exec($wCommand);
    $sql = "UPDATE `Employee` SET `emp_img` = '$image' WHERE `ID` = $employee_id";
    $result = $db->query($sql);
    $fetchImg = "SELECT * FROM `Employee` WHERE `ID` = $employee_id";
    $fetchResult = $db->query($fetchImg);
    $fetchEmployees = [];
    while ($row = $fetchResult->fetch_assoc()) {
        $fetchEmployees[] = $row;
    }
    $fetchImg = "http://localhost/Net2HW2/img/" . $fetchEmployees[0]['emp_img'];
    echo  $fetchImg;
}