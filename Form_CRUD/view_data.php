<html>
<body>
        
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

// Display data

    $sql="SELECT * FROM user_info";
    $result=$conn->query($sql);
    if ($result->num_rows>0)
    {
        echo '<table class="table">'; 
        echo "<thead>";
        echo "<tr>";
        echo "<th> ID</th>";
        echo "<th> First Name</th>";
        echo "<th> Last Name</th>";
        echo "<th> Address</th>";
        echo "<th> City</th>";
        echo "<th> Email Id</th>";
        echo "<th> Mobile Number</th>";
        echo "<th> DOB</th>";
        echo "<th> Marritial Status</th>";
        echo "<th> Hobby</th>";
        echo "<th> Gender</th>";
        echo "<th> Update</th>";
        echo "<th> Remove</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row=$result->fetch_assoc())
        {
            echo "<tr>";	
          echo "<td>".$row["user_id"]."</td>";
          echo "<td>".$row["firstname"]."</td>";
          echo "<td>".$row["lastname"]."</td>";
          echo "<td>".$row["address"]."</td>";	  
          echo "<td>".$row["city"]."</td>";
          echo "<td>".$row["emailid"]."</td>";
          echo "<td>".$row["mobile"]."</td>";
          echo "<td>".$row["dob"]."</td>";
          echo "<td>".$row["marritial_status"]."</td>";
          echo "<td>".$row["hobby"]."</td>";
          echo "<td>".$row["gender"]."</td>";
          ?>
          <td><a href="update_data.php?id=<?php echo $row["user_id"] ?>">Edit</td>
          <td><a href="delete_data.php?id=<?php echo $row["user_id"] ?>">Delete</td>
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
</body>
</html>