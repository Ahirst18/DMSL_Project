<?php
include("auth_session.php");
require_once ("../libs/conn.php");
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $query = "DELETE FROM `course` WHERE id = '".$id."'";
        if(mysqli_query($conn,$query)){
            header("location: add_course.php");
        }
    }

?>