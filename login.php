<?php

    require_once 'classes/DB.php';

    if(isset($_POST['submit']))
        {
            $type = $_POST['type'];
            $uname = $_POST['uname'];
            $pword = $_POST['pword'];
        }
    $con=DB::getConnection();
    if(!$con){
        die("Connection failed".mysqli_connect_error());
    }
    if($type=="F"){
        $tablename="fac_user";
    }
    else{
        $tablename="stu_user";
    }
    $sql = "SELECT * FROM $tablename WHERE Uname='$uname' and Password='$pword'";
    $rs = mysqli_query($con, $sql);
    $user=mysqli_fetch_assoc($rs);
    //mysqli_fetch_assoc($rs) - stores the recordset's first value in a dictionary like format {column_name:value}
    if(($user['Uname']==$_POST['uname']) and ($user['Password']==$_POST['pword'])){
        session_destroy();
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["logintbl"] = $tablename;
        $_SESSION["username"] = $user["Uname"];
        $_SESSION["password"] = $user["Password"];
        header("location:admin/dashboard.php");
    }
    else{
        echo "<script>alert('Invalid Username or Password');</script>";
        header("Location:login_form.php");
    }
    
    mysqli_close($con);
    ?>
<html>
    </html>
