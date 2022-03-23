$(document).ready(function () {  

    // AJAX View Data

    function viewData() {
        output = "";
        $.ajax({
            url: "subtask_data.php",
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
                    "<tr><td class='text-center' id='item_id'>" + 
                    x[index].item_id + 
                    "</td><td class='text-center'>" +
                    x[index].item_desc + 
                    "</td><td class='text-center'>" + 
                    x[index].item_date + 
                    "</td>" +
                    "<td class='text-center'><button class='btn btn-warning btn-sm btn-edit' item_id=" + x[index].item_id + ">Edit</button></td>" + 
                    "<td class='text-center'><button class='btn btn-danger btn-sm btn-del' item_id=" + x[index].item_id + ">Delete</button></td></tr>" ;
                    
                }
                $("#tbody").html(output);
            }
        });
    }
    viewData();

    // AJAX Data Insert 

    $x = 1;
    $maxfield = 10;

    $("#addmore").click(function (e) {
        e.preventDefault();
        console.log("add more button clicked");
        if ($x <= $maxfield) {
            $x++;
            $("#dynamic_field").append(' <div id="row_'+ $x +'"'+' class="input-group mb-3 dynamic-added"><div class="input-group-prepend" ><span class="input-group-text"><i class="fas fa-tasks"></i></span></div><input type="text" class="form-control" name="item_desc[]" id="item_desc' + $x + '" placeholder="Add Task"><button class="btn btn-danger float-right remove_btn" name="remove" id="' + $x + '"><i class="fas fa-minus"></i> Remove </button></div> ');
        }
    });

    $("#dynamic_field").on('click', '.remove_btn', function () {
        // e.preventDefault();
        $button_id = $(this).attr("id");
        console.log("Remove button clicked with id = " + $button_id);
        $('#row_' + $button_id +'').remove();
        
        // $(this).parent('id=row' + button_id).remove();
        $x--;
    });

    jQuery("#subtaskform").validate({

        rules : {
          'item_desc' : {
              required : true,
          },
        }, 
        messages : {
          'item_desc' : {
              required : "This field Can't be empty",
          },
        },

        submitHandler:function (form) {

            $("#submititem").click(function (e) {
                e.preventDefault();

                if ($("#subtaskform").valid()) {

                    console.log("SAVE button clicked");
                    let task_id = $("#task_id").val();
                    let item_id = $("#item_id").val();
                    let item_desc = []; 
                    for (let index = 1; index < 10; index++) {
                        if (($("#item_desc"+index).val()) != undefined) {
                            item_desc[index-1] = $("#item_desc"+index).val();    
                        }
                    }
                    
                    mydata = {task_id : task_id, item_id : item_id, item_desc : item_desc};
                    console.log(mydata);

                    $.ajax({
                        url : "subtask_add.php",
                        method: "POST",
                        // data:$("#subtaskform").serialize(),
                        data: JSON.stringify(mydata),
                        // type : "json",
                        success: function(data) {
                            console.log(data);
                            $('.dynamic-added').remove();
                            // $('#subtaskform')[0].reset();
                            console.log('Record Inserted Successfully.'); 
                            $("#subtaskform")[0].reset();
                            viewData();
                        }
                    }); 
                }
                
            });
        }
    });

    //Delete Data

    $("#tbody").on("click", ".btn-del", function () {
        console.log("Delete button clicked");
        let item_id = $(this).attr("item_id");
        console.log(item_id);

        mydata = {item_id : item_id};
        mythis = this;
        $.ajax({
            url : "subtask_delete.php",
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
        let item_id = $(this).attr("item_id");
        console.log(item_id);
        mydata = {item_id : item_id};
        $.ajax({
            url:"subtask_update.php",
            method:"POST",
            dataType:"json",
            data: JSON.stringify(mydata),
            success:function (data) {
                console.log(data);
                console.log(data.item_desc);
                $("#item_id").val(data.item_id);
                $("#item_desc1").val(data.item_desc);
            },
        });
     });

});