<?php
    require_once "classes/DB.php";
    require_once "classes/StuUser.php";

    if(isset($_POST)){
        $query = "update stu_user set name='".$_POST["name"]."',semester='".$_POST["sem"]."',description='".$_POST["desc"]."',contact='".$_POST["contact"]."', Profile='".$_POST["pimg"]."' where uname='".$_POST["uname"]."'";
        $con = DB::getConnection();
        mysqli_query($con, $query); 
        header("location:ShowCoordinators.php");
        echo "<script>alert('Record updated successfully');</script>";
    }
    
    //$student = new StuUser($_POST["uname"]);
    //$student->updateStudent();
?>