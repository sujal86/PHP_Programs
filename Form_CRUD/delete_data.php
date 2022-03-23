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

    // get id
    $id = $_GET['id'];
    echo "<br>"."Welcome " . $id . " to delete page";

    // Delete row
    
    $sql = "DELETE FROM user_info WHERE user_id='$id'";
    echo "<br>".$sql;
    if($conn->query($sql) === true) {
        
        echo "Records of id " . $id . "were deleted successfully.";

    } else {

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

    }
 
$conn->close();
?>