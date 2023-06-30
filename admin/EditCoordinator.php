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

    $editee = new StuUser($_GET['id']);
    
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
        <title>Fiesta | Update Coordinator </title>
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
        <?php if($header_flag){require 'utils/dash_header_fac.php';} else{require 'utils/dash_header_stu.php';} ?><!--header content. file found in utils folder-->
        <div class="container" style="padding:10px 60px 10px 60px">
            <center><h1 class="text-align-center">Update Student Co-ordinator</h1></center>
            <form class="add-student col-lg-12 " method="POST" action="StudentUpdater.php">
                <div class="row-lg-6 form-section" style="padding-left:13px;">
                    <label for="uname">Username:</label>
                    <input type="text" name="uname" id="uname" value=<?php echo $editee->getuname();?> required readonly><br>
                </div>

                <div class="row-lg-12 form-section" hidden>
                    <div class="col-lg-6">
                        <label for="pwrd">Password:</label>
                        <input type="password" name="pwrd" id="pwrd" value=<?php echo $editee->getpassword();?> required disabled>
                    </div>
                    <div class="col-lg-6">
                        <label for="cpwrd" hidden>Confirm Password:</label>
                        <input type="password" name="cpwrd" id="cpwrd" value=<?php echo $editee->getpassword();?> required hidden>
                    </div>
                </div>
                
                <hr>
                    <div class="row-lg-12 form-section" style="padding-left:13px;">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value=<?php echo $editee->getName();?> required>
                    </div>
                    <div class="row-lg-12 form-section">
                        <div class="col-lg-6">
                            <label for="dept">Department:</label>
                            <select name="dept" required disabled> 
                                <option value=<?php echo $editee->getDeptName().">".$editee->getDeptName(); ?></option>  <!--not an error, the > for the open tag is niside the php code -->
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="sem" required>Semester:</label>
                            <select name="sem">
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                                <option value="6th">6th</option>
                                <option value="7th">7th</option>
                                <option value="8th">8th</option>
                            </select>
                        </div>
                    </div>
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
                        <input type="file" id="pimg" name="pimg" value=<?php echo $editee->getProfile();?>><br>
                    </div>
                    
                    <center><input type="submit" class="submit-btn button btn-success" value="Update Details"></center>
                </div>
            </form>
        </div>
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
