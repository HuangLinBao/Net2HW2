<?php
require_once '../database/connect.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $employee_id = $_POST['id'];
    $sql = "UPDATE `Employee` SET `emp_Name` = '$name' WHERE `ID` = $employee_id";
    $result = $db->query($sql);
    echo json_encode($result);
}


if (isset($_GET['password'])) {
    $password = $_GET['password'];
    $employee_id = $_GET['id'];
    $sql = "UPDATE `Employee` SET `emp_Password` = '$password' WHERE `ID` = $employee_id";
    $result = $db->query($sql);
    echo json_encode($result);
}