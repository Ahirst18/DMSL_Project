<?php
include("auth_session.php");
require_once ("../libs/conn.php");
    $id = -1;
    if(isset($_REQUEST['id'])){
        $id =  $_REQUEST['id'];
        $std_name = $_REQUEST['std_name'];
        $std_id = $_REQUEST['std_id'];

        $cou_name = $_REQUEST['cou_name'];
        $class_attendacne = $_REQUEST['class_attendacne'];
        $home_work = $_REQUEST['home_work'];
        $class_test = $_REQUEST['class_test'];
        $mid_term = $_REQUEST['mid_term'];
        $final_marks = $_REQUEST['final_marks'];
    }
    if(isset($_REQUEST['update_marks'])){
        $class_attendacne = $_REQUEST['class_attendacne'];
        $home_work = $_REQUEST['home_work'];
        $class_test = $_REQUEST['class_test'];
        $mid_term = $_REQUEST['mid_term'];
        $final_marks = $_REQUEST['final_marks'];
        $update = "UPDATE `marks_distribution` SET `class_attendacne`='$class_attendacne',`home_work`='$home_work',`class_test`='$class_test',`mid_term`='$mid_term',`final`='$final_marks' WHERE id = '$id'";
        if(mysqli_query($conn,$update)){
            header("location: marks_dis.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
<style>

  .card-box {
    position: relative;
    color: #fff;
    padding: 20px 10px 40px;
    margin: 20px 0px;
}
.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}
.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}
.card-box .inner {
    padding: 5px 10px 0 10px;
}
.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
}
.card-box p {
    font-size: 18px;
}
.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 72px;
    color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    text-decoration: none;
}
.card-box:hover .card-box-footer {
    background: rgba(0, 0, 0, 0.3);
}
.bg-blue {
    background-color: #00c0ef !important;
}
.bg-green {
    background-color: #00a65a !important;
}
.bg-orange {
    background-color: #f39c12 !important;
}
.bg-red {
    background-color: #d9534f !important;
}
img.center {
    display: block;
    margin: 0 auto;
}


div.demo-content{box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.20);color:#8d9090;}
#notification-header {
	padding: 10px;
	text-align:right;
}
button#notification-icon {
	background: transparent;
	border: 0;
	position:relative;
	cursor:pointer;
}
#notification-count{
	position: absolute;
	left: 0px;
	top: 0px;
	font-size: 0.8em;		
	color: #de5050;
	font-weight:bold;
}
#form-header {
	font-size:1.5em;
}
#frmNotification {
	padding:20px 30px;
}
.form-row{
	padding-bottom:20px;
}
#btn-send {
	background: #258bdc;
	color: #FFF;
	padding: 10px 40px;
	border: 0px;
}
div.demo-content input[type='text'],textarea{
	width: 100%;
	padding: 10px 5px;
}
#notification-latest {
	color: white;
	position: fixed;
	z-index: 99;
	right: 0px;
	background: #17eccf;
	box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.20);		
	max-width: 250px;
	text-align: left;
}
.notification-item {
	padding:10px;
	border-bottom: #3ae2cb 1px solid;
	cursor:pointer;
}
.notification-subject {		
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.notification-comment {		
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  font-style:italic;
}
  </style>
</head>

<body style="font-family: 'SolaimanLipi', Arial, sans-serif !important;" >

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php include("sidebar.php");?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav  class="navbar navbar-expand-lg navbar-light bg-light border-bottom" >
        <button class="btn btn-primary" id="menu-toggle">Menu</button>
		
    
       
      </nav>

      <div class="container-fluid">
	  <div class="container">

      <form method="POST">
        <h4 style="margin-top: 20px;">Update Marks</h4>
      <div class="form-group">
            <div class="row">
                <div class="col">
                        <label>Student Name</label>
                        <input type="text" value="<?php echo $std_name; ?>" class="form-control chosen-select" placeholder="Enter course name" readonly required>
                </div>
                <div class="col">
                        <label>Course Name</label>
                        <input type="text" value="<?php echo $cou_name; ?>" class="form-control chosen-select" readonly required>
                </div>

            </div>
		 </div>

    
      <div class="form-group">
                  <div class="row">
                  <div class="col">
                      <label>Student ID</label>
                      <input type="text" value="<?php echo $std_id; ?>" class="form-control chosen-select" placeholder="Enter course name" readonly required>
                    </div>
                    <div class="col">
                        <label>Class Attendance</label>
                        <input type="number" value="<?php echo $class_attendacne; ?>" name="class_attendacne" class="form-control" placeholder="Enter Number" required>
                    </div>
                    
                  </div>
            </div>
            

            <div class="form-group">
                  <div class="row">
                    <div class="col">
                        <label>Class Test</label>
                        <input type="number"  value="<?php echo $class_test; ?>" name="class_test" class="form-control" placeholder="Enter Number" required>
                    </div>
                    <div class="col">
                      <label>Home Work</label>
                      <input type="number" value="<?php echo $home_work;; ?>" name="home_work" class="form-control" placeholder="Enter Number" required>
                  </div>

                  </div>
            </div>
            
            <div class="form-group">

            <div class="row">

            <div class="col">
                      <label>Mid Term</label>
                      <input type="number" value="<?php echo $mid_term; ?>" name="mid_term" class="form-control" placeholder="Enter Number" required>
                  </div>
                  <div class="col">
                      <label>Final</label>
                      <input type="number" value="<?php echo $final_marks; ?>" name="final_marks" class="form-control" placeholder="Enter Number" required>
                  </div>
            </div>
            </div>
          
            <button type="submit" name="update_marks" class="btn btn-primary">Update</button>

      </form>
	
      </div>
    </div>
	</div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
