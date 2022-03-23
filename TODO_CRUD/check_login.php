<?php

$db_host="localhost";
$db_user="root";
$db_passwd="";
$db_name="todo";
$main_page = "location: login.php";
$conn=new mysqli($db_host,$db_user,$db_passwd,$db_name);

if($conn->connect_error)
{
	die("Connection failed");
}

if(!empty($_POST["submit"])) {
    $email = $_REQUEST["emailid"];
    $password = $_REQUEST["password"];

    $sql = "SELECT * FROM user_info WHERE emailid = '$email' AND password = '$password' ";

    if ($result = $conn->query($sql)) {

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['emailid'] === $email && $row['password'] === $password) {
                
                session_start();
                $_SESSION['id'] = $row['user_id'];
                
                header("location: task.php");
            
            } else {
                echo '<script>  alert("Incorrect email id and password")</script>';
                header($main_page);
            }

        }  else {
            echo "ERROR -> ".mysqli_error($sql);
            header($main_page);
            
        }
        $result->free();
    } else {
        echo "ERROR: $sql.". mysqli_error($sql);
    }
} else {
    echo "ERROR -> ";
    header($main_page);
}

?>

