<?php
require_once '../database/connect.php';

if (isset($_GET['all'])) {
    $sql = "SELECT * FROM `Employee`";
    $result = $db->query($sql);
    $employees = [];
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
    echo json_encode($employees);
}

if (isset($_GET['delete'])) {
    $employee_id = $_GET['delete'];
    $sql = "DELETE FROM `Employee` WHERE `ID` = $employee_id";
    $result = $db->query($sql);
    echo json_encode($result);
}