<?php
require_once '../database/connect.php';

//login employee using ID and password
if (isset($_REQUEST['id'])) {
    $employee_id = $_REQUEST['id'];
    $sql = "SELECT * FROM `Employee` WHERE `ID` = $employee_id ";
    $result = $db->query($sql);
    $employees = [];
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
    $emID = $employees[0]['ID'];
    $emName = $employees[0]['emp_Name'];
    $emEmail = $employees[0]['emp_Email'];
    $emAddress = $employees[0]['Address'];
    $emImg = "http://localhost/Net2HW2/img/" . $employees[0]['emp_img'];

    echo $emID . "-" . $emName . "-" . $emEmail . "-" . $emAddress . "-" . $emImg . "-" . $employees[0]['emp_Password'];
}