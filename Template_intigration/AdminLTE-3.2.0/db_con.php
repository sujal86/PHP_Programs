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
    
?>