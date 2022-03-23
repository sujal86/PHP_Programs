<?php
/* 
Required fields 
firstname, lastname, emailid, mobile, dob, password
*/
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

$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$address=$_REQUEST['address'];
$city=$_REQUEST['city'];
$emailid=$_REQUEST['emailid'];
$mobile=$_REQUEST['mobile'];
$dob=$_REQUEST['dob'];
$marritial_status=$_REQUEST['marritial_status'];
$checkbox=$_REQUEST['hobby'];
$gender=$_REQUEST['gender'];
$password=$_REQUEST['password'];
$hobby="";  
foreach($checkbox as $chk1)  
{  
    $hobby .= $chk1.",";  
}

// Insert Data

    $sql="INSERT INTO user_info(firstname, lastname, address, city, 
    emailid, mobile, dob, marritial_status, hobby, gender, password ) VALUES 
    ('$firstname','$lastname','$address','$city','$emailid','$mobile','$dob',
    '$marritial_status','$hobby','$gender','$password')";
    
    if($conn->query($sql))
    {
        echo "Row Inserted <br/>";
        echo "<br>"."<a href='view_data.php'>View Data</a>";
    }
    else
    {
        echo "Unable to insert data" . mysqli_error($conn);
    }

?>