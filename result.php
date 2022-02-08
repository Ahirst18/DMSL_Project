<?php
    include_once('libs/sess.php');
    include_once('libs/conn.php');
    $student_id = $_SESSION['std_id'];
    $email = $_SESSION["email"];
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

    if(isset($_REQUEST['add_change_pw'])){
      $current = md5($_REQUEST['current_password']);
      $new = $_REQUEST['new_password'];
      $confirm = $_REQUEST['con_password'];
      if($new==$confirm){
        $db_password = "";
        $email  = $_SESSION['email'];
        $query = "SELECT * FROM `student_info` WHERE email = '".$email."'";
        $result = mysqli_query($conn,$query);
        $fetch = mysqli_fetch_array($result);
        $db_password = $fetch['password'];
        if($db_password==$current){
           $confirm = md5($confirm);
            $query = "UPDATE `student_info` SET `password`='$confirm' WHERE email = '".$email."'";
            mysqli_query($conn, $query);
        }else{
          echo "Current Password does not match!";
        }   
      }else{
        echo "New Password And Confirm Password does not match!";
      }
      
      
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>

    #t_tile{
        text-align: center;
    }
    .sidebar-container {
        position: fixed;
        width: 220px;
        height: 100%;
        left: 0;
        overflow-x: hidden;
        overflow-y: auto;
        background: #1a1a1a;
        color: #fff;
      }
      
      .content-container {
        padding-top: 20px;
      }
      
      .sidebar-logo {
        padding: 10px 15px 10px 30px;
        font-size: 20px;
        background-color: #2574A9;
      }
      
      .sidebar-navigation {
        padding: 0;
        margin: 0;
        list-style-type: none;
        position: relative;
      }
      
      .sidebar-navigation li {
        background-color: transparent;
        position: relative;
        display: inline-block;
        width: 100%;
        line-height: 20px;
      }
      
      .sidebar-navigation li a {
        padding: 10px 15px 10px 30px;
        display: block;
        color: #fff;
      }
      
      .sidebar-navigation li .fa {
        margin-right: 10px;
      }
      
      .sidebar-navigation li a:active,
      .sidebar-navigation li a:hover,
      .sidebar-navigation li a:focus {
        text-decoration: none;
        outline: none;
      }
      
      .sidebar-navigation li::before {
        background-color: #2574A9;
        position: absolute;
        content: '';
        height: 100%;
        left: 0;
        top: 0;
        -webkit-transition: width 0.2s ease-in;
        transition: width 0.2s ease-in;
        width: 3px;
        z-index: -1;
      }
      
      .sidebar-navigation li:hover::before {
        width: 100%;
      }
      
      .sidebar-navigation .header {
        font-size: 12px;
        text-transform: uppercase;
        background-color: #151515;
        padding: 10px 15px 10px 30px;
      }
      
      .sidebar-navigation .header::before {
        background-color: transparent;
      }
      
      .content-container {
        padding-left: 220px;
      }
    </style>
</head>
<body>
<div class="sidebar-container">
  <div class="sidebar-logo">
    Project Name
  </div>
  <?php include_once('side_bar.php');?>
</div>

<div class="content-container">

  <div class="container-fluid">


  <h3 id = "t_tile">Result</h3>
    <?php
    $student_id = $_SESSION['std_id'];
    
    $retrive = "SELECT course.name as c_name, course.code as c_code, marks_distribution.class_attendacne as attendance, marks_distribution.home_work as home_work, marks_distribution.class_test as class_test, marks_distribution.mid_term as mid_term, marks_distribution.final as final_marks FROM `marks_distribution` JOIN course on course.id = marks_distribution.course_id WHERE student_id = '$student_id' AND published = 1";
    $result = mysqli_query($conn,$retrive);
    $rowCount = 0;
    $total_CGPA = 0;
    if(mysqli_num_rows($result)<1){
      echo '<h3 id = "t_tile">Result not published yet!</h3>';
      exit;
    }
    
    ?>
    <table id="t_table" class="table" >
            <thead class="thead-dark">
                <tr>
                <th scope="col">Course Name</th>
                <th scope="col">Course Code</th>
                <th scope="col">Attendance</th>
                <th scope="col">Home Work</th>
                <th scope="col">Class Test</th>
                <th scope="col">Mid Term</th>
                <th scope="col">Final</th>
                <th scope="col">Letter</th>
                <th scope="col">CGPA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        
                            while($row = mysqli_fetch_array($result)){
                                    $total_marks = $row['attendance']+$row['home_work']+$row['class_test']+$row['mid_term']+$row['final_marks'];
                                    $letter = "";
                                    $grade = "";
                                    $rowCount++;
                                    if($total_marks>=80){
                                      $letter = "A+";
                                      $grade = 4.00;
                                      $total_CGPA+=$grade;
                                    }else if($total_marks>=75 && $total_marks<80){
                                      $letter = "A";
                                      $grade = 3.75;
                                      $total_CGPA+=$grade;
                                    }else if($total_marks>=70 && $total_marks<75){
                                      $letter = "A-";
                                      $grade = 3.50;
                                      $total_CGPA+=$grade;
                                    }else if($total_marks>=65 && $total_marks<70){
                                      $letter = "B+";
                                      $grade = 3.25;
                                      $total_CGPA+=$grade;
                                    }else if($total_marks>=60 && $total_marks<65){
                                      $letter = "B";
                                      $grade = 3.00;
                                      $total_CGPA+=$grade;
                                    }else if($total_marks>=55 && $total_marks<60){
                                      $letter = "B-";
                                      $grade = 2.75;
                                      $total_CGPA+=$grade;
                                    }else if($total_marks>=50 && $total_marks<55){
                                      $letter = "C+";
                                      $grade = 2.50;
                                      $total_CGPA+=$grade;
                                    }else if($total_marks>=45 && $total_marks<50){
                                      $letter = "C";
                                      $grade = 2.25;
                                      $total_CGPA+=$grade;
                                    }else if($total_marks>=40 && $total_marks<45){
                                      $letter = "D";
                                      $grade = 2.00;
                                      $total_CGPA+=$grade;
                                    }else if($total_marks<40){
                                      $letter = "F";
                                      $grade = 0.00;
                                    }

                                ?>
                            <tr>
                                <td><?php echo $row['c_name']?></td>
                                <td><?php echo $row['c_code']?></td>
                                <td><?php echo $row['attendance']?></td>
                                <td><?php echo $row['home_work']?></td>
                                <td><?php echo $row['class_test']?></td>
                                <td><?php echo $row['mid_term']?></td>
                                <td><?php echo $row['final_marks']?></td>
                                <td><?php echo $letter;?></td>
                                <td><?php echo round($grade,2);?></td>
                                </tr>
                               
                        <?php
                    }
                    ?>
                            <tr>
                                  <td colspan="9">Total CGPA: <?php echo round($total_CGPA/$rowCount,2); ?></td>
                                </tr>
            </tbody>
            
        </table>
        <div>
        <button class="btn btn-primary" onclick="window.print()">Print</button>
        </div>

  </div>
</div>
</body>
</html>


