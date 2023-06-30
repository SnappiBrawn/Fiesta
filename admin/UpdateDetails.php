<?php
    /////////////////put section in every page inside admin dir///////////////
    session_start();               
    if (!$_SESSION["loggedin"]){
        header("location:../index.php");
    }
    //////////////////////////////////////////////////////////////////////////
    require_once "classes/DB.php";
    require_once "classes/StuUser.php";
    require_once "classes/FacUser.php";
    
    //StuUser table desc ->Uname Password Name Dept Description Contact Semester
  
    $con=DB::getConnection();
    $deptlist=mysqli_fetch_all(mysqli_query($con, "select Dept_Name from Department"));
    //use classes/event object

    $editee = new StuUser($_SESSION["username"]);
    
    if($_SESSION["logintbl"]=="fac_user"){
        $header_flag=true;
    }
    else{
        $header_flag=false;
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fiesta | Update Details </title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <?php require 'utils/scripts.php'; ?><!--js links. file found in utils folder-->
        <style>
            .add-student{
                display: block;
                padding: 30px;
                margin: auto;
                border: 3px solid #e5dfdf;
                border-radius: 15px;
                font-size: 20px;
            }
            .form-section{
                margin: 5px;
                padding-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <script>
            function loginer(){
                document.getElementById("credentials").style.display="block";
                document.getElementById("about").style.display="none";
            }
            function descriper(){
                document.getElementById("credentials").style.display="none";
                document.getElementById("about").style.display="block";
            }

        </script>
        <?php if($header_flag){require 'utils/dash_header_fac.php';} else{require 'utils/dash_header_stu.php';} ?><!--header content. file found in utils folder-->
        <div class="container" style="padding:10px 60px 10px 60px">
            <center><h1 class="text-align-center">Update Details</h1></center>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-secondary active" onclick='loginer()'>
                <input type="radio" checked> Update Login Details</label>
                <label class="btn btn-secondary" onclick='descriper()'>
                <input type="radio" > Update Bio</label>
            </div>
            <form class="add-student col-lg-12 " method="POST" action="StudentSelfUpdater.php" id='credentials'>
                <div class="row-lg-6 form-section">
                    <label for="uname">New Username:</label>    
                    <input type="text" name="uname" id="uname" value=<?php echo $editee->getuname();?> required ><br>
                </div>

                <div class="row-lg-6 form-section">
                    <label for="pwrd">New Password:</label>
                    <input type="password" name="pwrd" id="pwrd" value=<?php echo $editee->getpassword();?> required >
                </div>
                <div class="row-lg-6 form-section">
                        <label for="cpwrd">Confirm New Password:</label>
                        <input type="password" name="cpwrd" id="cpwrd" value=<?php echo $editee->getpassword();?> required>
                </div>
                    <center><input type="submit" class="submit-btn button btn-success" value="Update Details"></center>
                
            </form>
            <form class="add-student col-lg-12 " method="POST" action="StudentSelfUpdater.php" id='about' style="display:none">
                <div class="container-fluid" style="display:flex; flex-direction:column; padding-left:20px;">
                    <label for="desc">Description:</label>
                    <textarea id="desc" name="desc" style="wrap:wrap; height:100px; width:auto;"><?php echo $editee->getDescription();?></textarea><br>    
                </div>
                <div class="row-lg-12 form-section" style="padding-left:13px;">
                    <label for="contact" required>Contact:</label>
                    <input type="text" id="contact" name="contact" value=<?php echo $editee->getContact();?>><br>
                </div>
                <div class="row-lg-12 form-section" style="padding-left:13px; display:flex; flex-direction:row;">
                    <label for="pimg">Profile Image:    </label>
                    <input type="file" id="pimg" name="pimg" accept=".jpg,.jpeg,.png"value=<?php echo $editee->getProfile();?>><br>
                </div>
                
                <center><input type="submit" class="submit-btn button btn-success" value="Update Details"></center>  
            </form>
        </div>
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
