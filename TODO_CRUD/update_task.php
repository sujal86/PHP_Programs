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
    session_start();
    $user_id = $_SESSION['id'];
    // $user_id = $_GET['user_id'];
    $task_id = $_GET['task_id'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Update Task</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <form action="" method="post" name="updatetask">
        <div class="row">
            <div>
                <input type="text" name="task_desc" id="task_desc" value="<?php if(isset($task_desc)){echo $task_desc;}?>" placeholder="Enter Your task">
            </div>
            <div class="col-xs-6">
                <input type="submit" name="update" id="update" value="update">
            </div>
        </div>
    </form>

    </body>
</html>

<?php

if(isset($_REQUEST['update']))
{
    
    if($_REQUEST['task_desc']=="")
    {
        echo "Fill the Task to update <hr>";
    }
    else
    {
        $update="UPDATE user_task SET task_desc=? WHERE user_id='$user_id' AND task_id='$task_id' ";
        $result=$conn->prepare($update);

        if($result)
        {
            $result->bind_param('s',$task_desc);
            $task_desc=$_REQUEST['task_desc'];
            echo "<br>";

            $result->execute();

            echo $result->affected_rows. "Row Updated <br/>";
            header("location: task.php");
        } else {
            echo "Error Report " .  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            echo "ERROR -> ". mysqli_error($update);
        }
        $result->close();
    }
}

?>