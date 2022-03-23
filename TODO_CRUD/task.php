<?php 
    session_start();
    
    if (isset($_SESSION['id'])) {
        echo "Welcome & user id is ". $_SESSION['id'];
    } else {
        header('location: login.php');
    }

    $user_id = $_SESSION['id'];

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
                <U>Daily Task
            </div>
            <div>
            <a class="text-right" href="logout.php">LOGOUT</a>
            </div>
            
        </header>
        <form action="add_task.php" method="post" id="taskform" name="taskform">
        <div class="container">
            <div class="row">
                    <label for="task_desc">Add Task</label>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <input type="text" name="task_desc" id="task_desc" placeholder="Enter Your task">
                </div>
                <div class="col-xs-6">
                    <input type="submit" name="submittask" id="submittask" value="ADD TASK">
                </div>
                <div>
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>">
                </div>

            </div>

        </div>
        </form>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="ajax.js"></script>
        <script>

            // $("#taskform").validate({
            //     rules : {
            //         task_desc : {
            //             required : true,
            //         },
            //     }, 
            //     messages : {
            //         task_desc : {
            //             required : "This field Can't be empty",
            //         },
            //     },

            //     submitHanler:function (form) {
            //         form.submit();
            //     },

            // });

        </script>
    </body>
</html>
<?php
    // Display Data

    echo '<table class="table">'; 
    echo "<thead>";
    echo "<tr>";
    echo "<th> Task ID</th>";
    echo "<th> Task Description</th>";
    echo "<th> Task Added</th>";
    echo "<th> Update</th>";
    echo "<th> Remove</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody id='tbody'></tbody>";
?>