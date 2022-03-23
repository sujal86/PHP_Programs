<?php 
    require 'db_con.php';

    session_start();
    $task_id = $_SESSION['task_id'];

    $data = stripcslashes(file_get_contents("php://input"));
    $mydata = json_decode($data, true);
    $item_id = $mydata['item_id'];

    $editdata = "SELECT * FROM check_list WHERE task_id = '$task_id' AND item_id = '$item_id' ";
    $result = $conn->query($editdata);
    $row = $result->fetch_assoc();

    echo json_encode($row);
?>