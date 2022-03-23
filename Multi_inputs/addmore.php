<?php  
  
    include 'db_con.php';

    session_start();
  
    if(!empty($_POST["name"])){  
  
        foreach ($_POST["name"] as $key => $value) {  
            $sql = "INSERT INTO tagslist(name) VALUES ('".$value."')";  
            $mysqli->query($sql);  
        }  
        echo json_encode(['success'=>'Names Inserted successfully.']);  
    }  
  
?>  