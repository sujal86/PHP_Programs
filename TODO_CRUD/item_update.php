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
    $item_id = $_GET['item_id'];
    $task_id = $_GET['task_id'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Update Item</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <form action="" method="post" name="updateitem">
        <div class="row">
            <div>
                <input type="text" name="item_desc" id="item_desc" value="<?php if(isset($item_desc)){echo $item_desc;}?>" placeholder="Enter Your task">
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
    
    if($_REQUEST['item_desc']=="")
    {
        echo "Fill the Item to update <hr>";
    }
    else
    {
        $update = "UPDATE check_list SET item_desc=? WHERE item_id = ? ";
        $result=$conn->prepare($update);

        if($result)
        {
            $result->bind_param('si',$item_desc,$item_id);
            $item_desc=$_REQUEST['item_desc'];
            $item_id = $_GET['item_id'];
            echo "<br>";
            echo $item_desc . "," . $item_id . "<br>";
            $result->execute();

            echo $result->affected_rows. "Row Updated <br/>";
            header("location: checklist_items.php?task_id=$task_id");
        } else {
            echo "Error Report " .  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            echo "ERROR -> ". mysqli_error($update);
        }
        $result->close();
    }
}

?>