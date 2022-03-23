$(document).ready(function () {  

    // AJAX View Data

    function viewData() {
        output = "";
        $.ajax({
            url: "data.php",
            dataType: "json",
            method : "POST",
            success:function (data) {
                console.log(data);
                if (data) {
                    x = data;
                    
                } else {
                    x = "";
                }
                for (let index = 0; index < x.length; index++) {
                    output += 
                    "<tr><td class='text-center' id='task_id'>" + 
                    x[index].task_id + 
                    "</td><td class='text-center'>" + "<a href='sub_task.php?task_id=" + x[index].task_id + "'>" +
                    x[index].task_desc + "</a>" +
                    "</td><td class='text-center'>" + 
                    x[index].task_date + 
                    "</td>" +
                    "<td class='text-center'><button class='btn btn-warning btn-sm btn-edit' task_id=" + x[index].task_id + ">Edit</button></td>" + 
                    "<td class='text-center'><button class='btn btn-danger btn-sm btn-del' task_id=" + x[index].task_id + ">Delete</button></td></tr>" ;
                    
                }
                $("#tbody").html(output);
            }
        });
    }
    viewData();

    // AJAX Data Insert 
    jQuery("#taskform").validate({
        rules : {
          'task_desc' : {
              required : true,
          },
        }, 
        messages : {
          'task_desc' : {
              required : "This field Can't be empty",
          },
        },
        submitHandler:function (form) {

            $("#submittask").click(function (e) {
                e.preventDefault();
                if ($("#taskform").valid()) {
                
                console.log("SAVE button clicked");
                let user_id = $("#user_id").val();
                let task_id = $("#task_id").val();
                let task_desc = $("#task_desc").val();
        
                mydata = {user_id : user_id, task_id : task_id, task_desc : task_desc};
                console.log(mydata);
        
                $.ajax({
                    url : "add_task.php",
                    method: "POST",
                    data: JSON.stringify(mydata),
                    success: function(data) {
                        console.log(data);
                        $("#taskform")[0].reset();
                        viewData();
                    }
                });
                }
            
            });
        },
    });


    
    

    //Delete Data

    $("#tbody").on("click", ".btn-del", function () {
        console.log("Delete button clicked");
        let task_id = $(this).attr("task_id");
        console.log(task_id);

        mydata = {task_id : task_id};
        mythis = this;
        $.ajax({
            url : "delete_task.php",
            method : "POST",
            data : JSON.stringify(mydata),
            success:function (data) {
                console.log(data);
               //  viewData();
               $(mythis).closest("tr").fadeOut();
                
            }
        })
        
    });


     // Edit Data

     $("#tbody").on("click", ".btn-edit", function () {
        console.log("Edit button clicked");
        let task_id = $(this).attr("task_id");
        console.log(task_id);
        mydata = {task_id : task_id};
        $.ajax({
            url:"update_task.php",
            method:"POST",
            dataType:"json",
            data: JSON.stringify(mydata),
            success:function (data) {
                console.log(data);
                $("#task_id").val(data.task_id);
                $("#task_desc").val(data.task_desc);
            },
        });
     });

});
