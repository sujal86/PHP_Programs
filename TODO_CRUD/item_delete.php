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
    $item_id = $_GET['item_id'];

    // Delete row
    
    $sql = "DELETE FROM check_list WHERE item_id = '$item_id' ";
    
    if($conn->query($sql) === true) {
        
        echo "Item id " . $item_id . "were deleted successfully.";

    } else {

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

    }
 
$conn->close();
?>