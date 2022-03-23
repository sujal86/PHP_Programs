<?php
session_start();

if(isset($_SESSION['id'])) {
     header("Location: task.php");
     exit(); 
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
        <link rel="stylesheet" href="">
    </head>
    <body>
        <header>
            Login Here
        </header>
        <form action="check_login.php" method="post">
            <div>    
                <label for="emailid">Email Id:</label>
            </div>
            <div>
                <input type="email" name="emailid" id="emailid" placeholder="Enter your Email" title="Enter your valid email id" required>
            </div>
            <div>
                <label for="password">Password:</label>
            </div>
            <div>
                <input type="password" name="password" id="password" title="Enter your password" required>
            </div>
            <div>
                <label for="show_password">Show Password</label>
                <input type="checkbox" name="show_password" id="show_password" onclick="showPassword();">
            </div>
            <div>
                <label for="conf_password">
                    Confirmed Password:
                </label>
            </div>
            <div>
                <input type="password" name="conf_password" id="conf_password" title="Enter same password as above" required>
            </div>
            <div>
                <input type="submit" onclick="conPassword();" name="submit" id="submit" value="Submit">
            </div>
        </form>
        <div>
            Not a member
        </div>
        <a href="../Form_CRUD/first.html">Register Here</a>

        <script>
            function conPassword() {
                let password_one = document.getElementById("password").value;
                let password_con = document.getElementById("conf_password").value;

                if (password_one === password_con) {
                   // alert("Password enterd correctly");
                } else {
                    alert("Please enter same password as above");
                }
            }
            function showPassword() {
                let pswrd = document.getElementById("password");
                if (pswrd.type === "password") {
                    pswrd.type = "text";
                } else {
                    pswrd.type = "password";
                }
            }
        </script>
    </body>
</html>