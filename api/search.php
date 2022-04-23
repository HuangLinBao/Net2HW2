<?php
require_once '../database/connect.php';

if (isset($_GET['id'])) {

    $employee_id = $_GET['id'];
    $sql = "SELECT * FROM `Employee` WHERE ID = $employee_id";
    $result = $db->query($sql);
    $employees = [];
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
    echo json_encode($employees);
}

if (isset($_GET['name'])) {

    $employee_name = $_GET['name'];
    $sql = "SELECT * FROM `Employee` WHERE `emp_Name` = '$employee_name' ";
    $result = $db->query($sql);
    $employees = [];
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
    echo json_encode($employees);
}