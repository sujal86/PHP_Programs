<?php 
    session_start();
    $task_id = $_GET['task_id'];
    $user_id = $_SESSION['id'];
    if (isset($_SESSION['id'])) {
        echo "Welcome & user id is ". $_SESSION['id'] . "and task id is " . $task_id;
    } else {
        header('location: login.php');
    }

$db_host="localhost";
$db_user="root";
$db_passwd="";
$db_name="todo";

$conn=new mysqli($db_host,$db_user,$db_passwd,$db_name);

if($conn->connect_error)
{
	die("Connection failed");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">
    </head>
    <body>
        <header>
            <div class="text-center">

                    <?php 
                    $task = "SELECT * FROM user_task WHERE user_id = '$user_id' AND task_id = '$task_id' ";
                    $view = $conn->query($task);

                    if ($view->num_rows > 0) {
                        echo "<h3 class='text-center'>Task</h3>";
                        while ($row = $view->fetch_assoc()) {
                            ?>
                            <td class='text-center'>
                                <a href="task.php?user_id=<?php echo $user_id ?> ">
                                <?php echo $row['task_desc']; ?>
                            </td>
                            
                            <?php
                        }
                    }
                    ?>
            </div>
            <div>
            <a class="text-right" href="logout.php">LOGOUT</a>
            </div>
            
        </header>
        <form action="" method="post">
        <div class="container">
            <div class="row">
                    <label for="item_desc">Add Items</label>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <input type="text" name="item_desc" id="item_desc" placeholder="Enter Your task items">
                </div>
                <div class="col-xs-6">
                    <input type="submit" name="submititem" id="submititem" value="ADD ITEM">
                </div>

            </div>

        </div>
        </form>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN">
    </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q">
    </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl">
    </script>
    </body>
</html>

<?php

if (isset($_REQUEST['submititem'])) {
    
    $item_desc = $_REQUEST['item_desc'];
    $item_date = date("Y-m-d");

    $sql = "INSERT INTO check_list (task_id, item_desc, item_date) VALUES 
    ('$task_id', '$item_desc','$item_date')";

    if ($conn->query($sql)) {
        echo "Task Added successfully";
    } else {
        echo "ERROR -> ". mysqli_error($sql);
    }
}
    
    $viewdata = "SELECT * FROM check_list WHERE task_id = '$task_id' ";
    $result=$conn->query($viewdata);
    if ($result->num_rows>0)
    {
        echo '<table class="table">'; 
        echo "<thead>";
        echo "<tr>";
        echo "<th> Sub Task ID</th>";
        echo "<th> Item Description</th>";
        echo "<th> Item Added</th>";
        echo "<th> Update</th>";
        echo "<th> Remove</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row=$result->fetch_assoc())
        {
            echo "<tr>";	
            echo "<td class='text-center'>".$row["item_id"]."</td>";
            echo "<td class='text-center'>".$row["item_desc"]."</td>";   
            echo "<td class='text-center'>".$row["item_date"]."</td>";
          ?>
          <td class='text-center'><a href="sub_task_update.php?item_id=<?php echo $row['item_id'] ?> && task_id=<?php echo $row['task_id'] ?>  ">Edit</td>
          <td class='text-center'><a href="sub_task_delete.php?item_id=<?php echo $row["item_id"] ?>">Delete</td>
        </tr>
        <?php
        }
    echo "</tbody>";
    echo "<table>";
    }
    else 
    {
        echo "0 Results";
    }

?>