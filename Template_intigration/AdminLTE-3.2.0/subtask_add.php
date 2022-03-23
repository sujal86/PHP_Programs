<?php
    require 'db_con.php';

    session_start();
    $task_id = $_SESSION['task_id'];
    
    $data = stripcslashes(file_get_contents("php://input"));
    $mydata = json_decode($data, true);
    $task_id = $mydata['task_id'];
    $item_id = $mydata['item_id'];
    $items = $mydata['item_desc'];
    $item_date = date("Y-m-d");

    if ($item_id == "") {

        if (is_array($items)) {

            foreach ($items as $row => $value) {

                $item_desc = mysqli_real_escape_string($conn, $value);
                $sql = "INSERT INTO check_list (task_id, item_desc, item_date) VALUES 
                ('$task_id','$value','$item_date') ";
                mysqli_query($conn, $sql);
                echo "Subtask Added successfully";
            }
        }

    } else {

        if (is_array($items)) {

            foreach ($items as $row => $value) {

                $item_desc = mysqli_real_escape_string($conn, $value);
                $sql = "INSERT INTO check_list (task_id ,item_id, item_desc, item_date) VALUES 
                ('$task_id','$item_id','$value','$item_date') ON DUPLICATE KEY UPDATE 
                item_desc = '$value' ";     
                mysqli_query($conn, $sql);           
            }
        }

    }
    
?>