<?php
    session_start();
    $student_id = $_SESSION['std_id'];
    $email = $_SESSION["email"];
    include_once('libs/conn.php');

    if(isset($_REQUEST['add_course'])){
        $id = $_REQUEST['course_name'];

        $query = "SELECT id FROM `student_info` WHERE email = '$email'";
        $result = mysqli_query($conn,$query);
        $student_id = $_SESSION['std_id'];
        
        $check = "SELECT * FROM `enrolled_course` WHERE course_id = '$id' AND student_id = '$student_id'";
        $store = mysqli_query($conn,$check);
        if(mysqli_num_rows($store)>0){
          echo "Already enrolled!"; 
        }else{
          $query = "INSERT INTO `enrolled_course`(`course_id`,`student_id`) VALUES ('$id','$student_id')";
          if(mysqli_query($conn,$query)){
              echo "Inserted";
          }else{
              echo "Nope";
          }
        }
      
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        html,body{
			height: 100%;
			margin: 0;
			background: rgb(2,0,36);
           
		
		}
   
   .myForm{
   	background-color: rgba(0,0,0,0.5) !important;
   	padding: 15px !important;
   border-radius: 15px !important;
   color: white;
   
   }

   input{
   	border-radius:0 15px 15px 0 !important;

   }
   input:focus{
       outline: none;
box-shadow:none !important;
border:1px solid #ccc !important;

   }

   .br-15{
   	border-radius: 15px 0 0 15px !important;
   }

   #add_more{
   	color: white !important;
   	background-color: #fa8231 !important;
   	border-radius: 15px !important;
   	border: 0 !important;

   }
   #remove_more{
   	color: white !important;
   	background-color: #fc5c65 !important;
   	border-radius: 15px !important;
   	border: 0 !important;
   	display: none;

   }
   	
   .submit_btn{
   	border-radius: 15px !important;
    background-color: #95c714 !important;
    border: 0 !important;
   }
    </style>
    <title>Document</title>
</head>
<body>
<?php include_once('backup.php'); ?>
<form>
<div class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="card mt-5 col-md-4 animated bounceInDown myForm">
			<div class="card-header">
				<h4>Add course</h4>
			</div>
			<div class="card-body">
				<form>
					<div id="dynamic_container">
						<div class="input-group">
                        <div class="col">
                    <label>Select Semester</label>
                        <select name="semester" id = "semester" class="form-control chosen-select">
                            <option value="">Please select semester</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                            <option value="5">5th</option>
                            <option value="6">6th</option>
                            <option value="7">7th</option>
                            <option value="8">8th</option>
                        </select>
                </div>
						</div>
						<div class="input-group mt-3">
                        <div class="col">
                    <label>Select Course</label>
                        <select name="course_name" id = "course_name" class="form-control chosen-select" required>
                            <option value="">Select Course</option>
                        </select>
                </div>
						</div>
					</div>
                    <div class="card-footer">
                        <button type="submit" name="add_course" class="btn btn-success btn-sm float-right submit_btn"><i class="fas fa-arrow-alt-circle-right"></i> Submit</button>
                    </div>
				</form>
			</div>
			
		</div>
	</div>
	</div>
</form>



<script>

$(document).ready(function() {
    $("#semester").change(function() {
        var semester_id = $(this).val();
        if(semester_id != "") {
        $.ajax({
            url:"fetch_course.php",
            data:{course_id:semester_id},
            type:'POST',
            success:function(response) {
            var resp = $.trim(response);
                $("#course_name").html(resp);
            }
        });
        } else {
        $("#course_name").html("<option value=''>------- Select --------</option>");
        }
    });
    });
</script>
</body>
</html>