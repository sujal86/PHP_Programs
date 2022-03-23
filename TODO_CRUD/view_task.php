<?php 
    require "db_conn.php";

    session_start();
    $user_id = $_SESSION['id'];

    $viewdata = "SELECT * FROM user_task WHERE user_id = '$user_id' ";
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