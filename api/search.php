<?php
require_once '../database/connect.php';

if (isset($_REQUEST['id'])) {

    $employee_id = $_REQUEST['id'];
    $sql = "SELECT * FROM `Employee` WHERE ID = $employee_id";
    $result = $db->query($sql);
    $employees = [];
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
    echo count($employees) . "\n";
    //for looping 
    for ($i = 0; $i < count($employees); $i++) {
        $emID = $employees[$i]['ID'];
        $emName = $employees[$i]['emp_Name'];
        $emEmail = $employees[$i]['emp_Email'];
        $emAddress = $employees[$i]['Address'];
        $emImg = "http://localhost/Net2HW2/img/" . $employees[$i]['emp_img'];
        $emPassword = $employees[$i]['emp_Password'];
        echo $emID . "-" . $emName . "-" . $emEmail . "-" . $emPassword . "-" . $emAddress . "-" . $emImg;
        echo (count($employees) - 1) == $i ? "" : ",";
    }
}

if (isset($_GET['name'])) {

    $employee_name = $_REQUEST['name'];
    $sql = "SELECT * FROM `Employee` WHERE `emp_Name` = '$employee_name' ";
    $result = $db->query($sql);
    $employees = [];
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
    echo count($employees) . "\n";
    //for looping 
    for ($i = 0; $i < count($employees); $i++) {
        $emID = $employees[$i]['ID'];
        $emName = $employees[$i]['emp_Name'];
        $emEmail = $employees[$i]['emp_Email'];
        $emAddress = $employees[$i]['Address'];
        $emImg = "http://localhost/Net2HW2/img/" . $employees[$i]['emp_img'];
        $emPassword = $employees[$i]['emp_Password'];
        echo $emID . "-" . $emName . "-" . $emEmail . "-" . $emPassword . "-" . $emAddress . "-" . $emImg;
        echo (count($employees) - 1) == $i ? "" : ",";
    }
}