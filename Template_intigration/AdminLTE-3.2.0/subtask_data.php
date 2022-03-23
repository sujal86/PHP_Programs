<?php 
    require "db_con.php";

    session_start();
    $task_id = $_SESSION['task_id'];

    $viewdata = "SELECT * FROM check_list WHERE task_id = '$task_id' ";
        $result=$conn->query($viewdata);
        if ($result->num_rows>0)
        {
            $data = array();
            while ($row=$result->fetch_assoc())
            {
                $data[] = $row;
            }
        }

    echo json_encode($data);

?>