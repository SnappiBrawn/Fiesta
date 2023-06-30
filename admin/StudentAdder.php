<?php

    require_once "classes/StuUser.php";
    include_once "classes/DB.php";

if(isset($_POST)){
    $con = DB::getConnection();
    $validate = mysqli_fetch_all(mysqli_query($con,'select uname from stu_user'));
    if(in_array($_POST['uname'],$validate)){
        echo "<script>alert('moshi moshii ingga saan, username taken :)');</script>";
    }

    ///echo "<script>alert('moshi moshii ingga saan');</script>"; USE THIS TO SEND POP-UPS
    $desc = htmlspecialchars($_POST['desc'],ENT_QUOTES);
    

    $student = new StuUser([$_POST["uname"],$_POST["pwrd"],$_POST["name"],$_POST["dept"],$_POST["desc"],$_POST["contact"],$_POST["pimg"],$_POST["sem"]]);
    $student->addStudent();
    header("location:ShowCoordinators.php");
}

?>