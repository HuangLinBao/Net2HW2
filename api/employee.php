<?php
require_once '../database/connect.php';

if (isset($_GET['all'])) {
    $sql = "SELECT * FROM `Employee`";
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

if (isset($_REQUEST['delete'])) {
    $employee_id = $_REQUEST['delete'];
    $tmpSql = "SELECT * FROM `Employee` WHERE `ID` = $employee_id";
    $tmpResult = $db->query($tmpSql);
    if (mysqli_num_rows($tmpResult) == 0) {
        echo "No such ID";
    } else {


        $tmpEmployees = [];
        while ($row = $tmpResult->fetch_assoc()) {
            $tmpEmployees[] = $row;
        }
        $tmpImage = $tmpEmployees[0]['emp_img'];
        $rmCommand = "rm ../img/$tmpImage";
        shell_exec($rmCommand);
        $sql = "DELETE FROM `Employee` WHERE `ID` = $employee_id";
        $result = $db->query($sql);
        echo "employee " . $employee_id . " deleted";
    }
}