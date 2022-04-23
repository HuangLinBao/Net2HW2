<?php
require_once '../database/connect.php';

//check if employee ID and password exist in database
if (isset($_REQUEST['id']) && isset($_REQUEST['password'])) {
    $employee_id = $_REQUEST['id'];
    $employee_password = $_REQUEST['password'];
    $sql = "SELECT * FROM `Employee` WHERE `ID` = $employee_id AND `emp_Password` = '$employee_password'";
    $result = $db->query($sql);

    echo (mysqli_num_rows($result) == 0) ? "false" : "true";
}