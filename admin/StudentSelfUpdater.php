<?php
    require_once "classes/DB.php";
    require_once "classes/StuUser.php";
    session_start();

    $user=new StuUser($_SESSION["username"]);
    echo $user->getuname();
    if(isset($_POST["uname"])){
        $user->setuname($_POST["uname"]);
        $user->setpassword($_POST["pwrd"]);
        $user->updateStudent($_SESSION["username"]);
    }
    
    else{
        $user->setDescription($_POST["desc"]);
        $user->setContact($_POST["contact"]);
        $user->setProfile($_POST["pimg"]);
        $user->updateStudent($_SESSION["username"]);
    }
    $_SESSION['username'] = $user->getuname();
    header("location:Dashboard.php");
?>