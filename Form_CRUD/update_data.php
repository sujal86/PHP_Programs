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
    $id=$_GET['id'];
    echo "<br>"."Welcome id" . $id . " to Update page";



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Update Data</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
        crossorigin="anonymous"/>
    </head>
    <body>
    <div class="container">
            <form action="" method="post" autocomplete="off" name="userinfo">
                <div class="row">
                    <div class="col-xs-6">
                        <label for="firstname">First Name</label>
                    </div>
                    <div class="col-xs-6">
                        <label for="lastname">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="text" id="firstname" name="firstname" pattern="[A-Za-z]{2,15}" placeholder="First Name" value="<?php if(isset($firstname)){echo $firstname;}?>">
                    </div>
                    <div class="col-xs-6">
                        <input type="text" id="lastname" name="lastname" pattern="[A-Za-z]{2,15}" placeholder="Last Name" value="<?php if(isset($lastname)){echo $lastname;}?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label for="Address">Address</label>
                    </div>
                    <div class="col-xs-6">
                        <label for="city">City</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <textarea name="address" id="address" cols="30" rows="3" placeholder="Enter your Address..." value="<?php if(isset($address)){echo $address;}?>"></textarea>
                    </div>
                    <div class="col-xs-6">
                        <select id="city" name="city">
                            <option value="<?php if(isset($city)){echo $city;}?>"><?php if(isset($city)){echo $city;}?></option>
                            <option value="Ahmedabad">Ahmedabad</option>
                            <option value="Vadodara">Vadodara</option>
                            <option value="Surat">Surat</option>
                            <option value="Rajkot">Rajkot</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label for="emailid">Email Id</label>
                    </div>
                    <div>
                        <label for="mobile">Mobile</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="email" name="emailid" id="emailid" pattern="([a-zA-z]).([@]){,40}" value="<?php if(isset($emailid)){echo $emailid;}?>" placeholder="enter your valid email id" >
                    </div>
                    <div class="col-xs-6">
                        <input type="number" name="mobile" id="mobile" pattern="[0-9]{10}" value="<?php if(isset($mobile)){echo $mobile;}?>" placeholder="enter your mobile number" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label for="dob">DOB</label>
                    </div>
                    <div class="col-xs-6">
                        <label for="marritial_status">Marritial Status</label>
                    </div>
                </div>
                <div class="col-xs-6">
                    <input type="date" name="dob" id="dob">
                </div>
                <div class="col-xs-6">
                    <select name="marritial_status" id="marritial_status">
                        <option value="<?php if(isset($marritial_status)){echo $marritial_status;}?>"><?php if(isset($marritial_status)){echo $marritial_status;}?></option>
                        <option value="Married">Married</option>
                        <option value="Unmarried">Unmarried</option>
                        <option value="other">Not to Disclouse</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label for="hobby">Hobby</label>
                    </div>
                    <div class="col-xs-6">
                        <label for="gender">Gender</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="checkbox" name="hobby[]" id="sport" value="sport">Sport
                        <input type="checkbox" name="hobby[]" id="music" value="music">Music
                        <input type="checkbox" name="hobby[]" id="travel" value="travel">Travel
                        <input type="checkbox" name="hobby[]" id="reading" value="reading">Reading
                        <input type="checkbox" name="hobby[]" id="others" value="others">Others
                    </div>
                    <div class="col-xs-6">
                        <input type="radio" name="gender" id="male" value="male">Male
                        <input type="radio" name="gender" id="female" value="female">Female
                        <input type="radio" name="gender" id="transgender" value="transgender">Transgender
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label for="password">Password</label>
                    </div>
                    <div class="col-xs-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="password" name="password" id="password" value="<?php if(isset($password)){echo $password;}?>" placeholder="Enter password" >
                    </div>
                    <div class="col-xs-6">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $id?>" >
                    </div>
                </div>
                <div class="row text-center">
                    <input type="submit" name="update" id="update" value="Update">
                </div>
            </form>
        </div>
        <script src="" async defer></script>
    
        <?php

if(isset($_REQUEST['update']))
{
    if(($_REQUEST['hobby']=="")||($_REQUEST['gender']=="")||($_REQUEST['dob']==""))
    {
        echo "Fill the hobby, Gender and DOB fields for update <hr>";
    }
    else
    {
        $sql="UPDATE user_info SET firstname=?, lastname=?, address=?, city=?, emailid=?, 
        mobile=?, dob=?,marritial_status=?, hobby=?, gender=?, password=? WHERE user_id=?";
        $result=$conn->prepare($sql);
        
        if($result)
        {
            $result->bind_param('sssssssssssi',$firstname,$lastname,$address,$city,
            $emailid,$mobile,$dob,$marritial_status,$hobby,$gender,$password,$id);
            
            $firstname=$_REQUEST['firstname'];
            $lastname=$_REQUEST['lastname'];
            $address=$_REQUEST['address'];
            $city=$_REQUEST['city'];
            $emailid=$_REQUEST['emailid'];
            $mobile=$_REQUEST['mobile'];
            $dob=$_REQUEST['dob'];
            $marritial_status=$_REQUEST['marritial_status'];
            $checkbox=$_REQUEST['hobby'];
            $hobby="";
            foreach($checkbox as $chk1)  
            {  
                $hobby .= $chk1.",";  
            }
            $gender=$_REQUEST['gender'];
            $password=$_REQUEST['password'];
            $id=$_REQUEST['id']; 
            echo "<br>";
            $result->execute();
            
            echo $result->affected_rows. "Row Updated <br/>";
        }
        
        $result->close();
    }
}
        ?>

    </body>
</html>