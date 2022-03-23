<?php 
    require "db_con.php";

    session_start();
    $task_id = $_SESSION['task_id'];
    
    $data = stripcslashes(file_get_contents("php://input"));
    $mydata = json_decode($data, true);
    $item_id = $mydata['item_id'];

    $sql = "DELETE FROM check_list WHERE item_id = '$item_id' ";

    if($conn->query($sql) === true) {
        
        echo "Item id " . $item_id . "were deleted successfully.";

    } else {

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

    }
?>