<?php
    require 'db_conn.php';
    
    $data = stripcslashes(file_get_contents("php://input"));
    $mydata = json_decode($data, true);
    $user_id = $mydata['user_id'];
    $task_id = $mydata['task_id'];
    $task_desc = $mydata['task_desc'];
    $task_date = date("Y-m-d");

    // Insert and update data

    if ($task_id == "") {
        $sql = "INSERT INTO user_task (user_id, task_desc, task_date) VALUES 
     ('$user_id','$task_desc','$task_date') ";

    } else {
        $sql = "INSERT INTO user_task (user_id,task_id ,task_desc, task_date) VALUES 
     ('$user_id', '$task_id','$task_desc','$task_date') ON DUPLICATE KEY UPDATE 
        task_desc = '$task_desc' ";      

    }
    
    if ($conn->query($sql)) {
        echo "Task Added successfully";
    } else {
        echo "ERROR -> ". mysqli_error($sql);
    }
?>