<?php
    $db_host="localhost";
    $db_user="root";
    $db_passwd="";
    $db_name="todo";
    
    $conn=new mysqli($db_host,$db_user,$db_passwd,$db_name);
    
    if($conn->connect_error)
    {
        die("Connection failed");
    }
    echo "Connected successfully<hr/>";

    // get Ids
    $user_id = $_GET['user_id'];
    $task_id = $_GET['task_id'];

    // Delete row
    
    $sql = "DELETE FROM user_task WHERE user_id='$user_id' AND task_id = '$task_id' ";
    
    if($conn->query($sql) === true) {
        
        echo "Task id " . $task_id . "were deleted successfully.";

    } else {

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

    }
 
$conn->close();
?>