<?php 
    require "db_conn.php";

    session_start();
    $user_id = $_SESSION['id'];
    
    $data = stripcslashes(file_get_contents("php://input"));
    $mydata = json_decode($data, true);
    $task_id = $mydata['task_id'];

    $sql = "DELETE FROM user_task WHERE user_id='$user_id' AND task_id = '$task_id' ";

    if($conn->query($sql) === true) {
        
        echo "Task id " . $task_id . "were deleted successfully.";

    } else {

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

    }


?>