<?php 
    require "db_conn.php";

    session_start();
    $user_id = $_SESSION['id'];

    $data = stripcslashes(file_get_contents("php://input"));
    $mydata = json_decode($data, true);
    $task_id = $mydata['task_id'];

    $editdata = "SELECT * FROM user_task WHERE user_id = '$user_id' AND task_id = '$task_id' ";
        $result=$conn->query($editdata);
        $row=$result->fetch_assoc();

    echo json_encode($row);

?>