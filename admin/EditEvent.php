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
    require_once "classes/Event.php";
    //StuUser table desc ->Uname Password Name Dept Description Contact Semester
  
    $con=DB::getConnection();
    $sql= "select * from ".$_SESSION["logintbl"]." where Uname='".$_SESSION["username"]."' and password='".$_SESSION["password"]."'";
    $rs = mysqli_query($con, $sql);
    if($_SESSION["logintbl"]=="stu_user"){
        $user= new StuUser(mysqli_fetch_row($rs));
    }
    else{
        $user=new FacUser(mysqli_fetch_row($rs));
    }
    $deptf=mysqli_fetch_row(mysqli_query($con, "select Dept_FullName from Department where Dept_ID='".$user->getDept()."'"))[0];
    $eventlist = mysqli_fetch_all(mysqli_query($con, "select type_Name from event_type;"));
    $deptlist=mysqli_fetch_all(mysqli_query($con, "select Dept_Name from Department"));
    $fclist=mysqli_fetch_all(mysqli_query($con, "select Name from fac_user where dept='".$user->getDept()."'"));
    $sclist=mysqli_fetch_all(mysqli_query($con, "select Name from stu_user where dept='".$user->getDept()."'"));
    //use classes/event object

    $editee = new Event($_GET["id"]);


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
        <title>Fiesta | Update Event </title>
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
        <script>
            document.getElementById('date').setAttribute('min', getTodaysDate());
        </script>
    </head>
    <body>
        <?php if($header_flag){require 'utils/dash_header_fac.php';} else{require 'utils/dash_header_stu.php';} ?><!--header content. file found in utils folder-->
        <div class="container" style="padding:10px 60px 10px 60px">
            <center><h1 class="text-align-center">Update Event</h1></center>
            <form class="add-student col-lg-12 " method="POST" action="EventAdder.php">
                <div class="row-lg-6 form-section" style="padding-left:13px;">
                    <label for="eid">Event ID:</label>
                    <input type="text" name="eid" id="eid" required value=<?php echo $editee->getEventID();?> readonly><br>
                </div>
                <div class="row-lg-6 form-section" style="display:flex; flex-direction:row; padding-left:13px;">
                    <label for="event_title">Title:</label>
                    <input type="input" name="event_title" id="event_title" value=<?php echo "'".$editee->getTitle()."'";?> required style="margin-left:5px ; flex:1;" readonly>
                </div>

                <div class="row-lg-12 form-section">
                    <div class="col-lg-6">
                        <label for="event_type">Event Type:</label>
                        <select name="event_type" >
                            <option value=<?php echo "'".$editee->getType()."'";?>><?php echo $editee->getTypeName();?></option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="dept">Department:</label>
                        <select name="dept" required> 
                            <option value=<?php echo $editee->getDeptName();?>><?php echo $editee->getDeptName();?></option>
                        </select>    
                    </div>
                </div><hr>
                    <div class="row-lg-12 form-section">
                        <div class="col-lg-6">
                            <label for="fc">Faculty Coordinator:</label>
                            <select name="fc" style="padding-right:20px;">
                                <?php for($i=0;$i<count($fclist);$i++){?>
                                <option value=<?php echo "'".$fclist[$i][0]."'"; ?>><?php echo $fclist[$i][0]; }?></option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="sc">Student Coordinator:</label>
                            <select name="sc" style="padding-right:50px;">
                                <?php for($i=0;$i<count($sclist);$i++){?>
                                <option value=<?php echo "'".$sclist[$i][0]."'"; ?>><?php echo $sclist[$i][0]; }?></option>
                            </select>
                        </div>
                    </div><br>
                    <div class="row-lg-12 form-section" style="padding-left:13px;">
                        <label for="date" required>Event Date:</label>
                        <input type="date" id="date" name="date" value=<?php echo $editee->getDate();?>><br>
                    </div>
                    <div class="row-lg-12 form-section" style="display:flex; padding-left:13px;">
                        <label for="venue" required>Event Venue:</label>
                        <input type="input" id="venue" name="venue" value=<?php echo "'".$editee->getVenue()."'";?> style="flex:1;"><br>
                    </div>
                    <div class="container-fluid" style="display:flex; flex-direction:column; padding-left:20px;">
                        <label for="desc">Event Description:</label>
                        <textarea id="desc" name="desc" style="wrap:wrap; height:100px; width:auto;"><?php echo $editee->getDescription();?></textarea><br>    
                    </div>
                    <div class="row-lg-12 form-section" style="display:flex; flex-direction: row; padding-left:13px;">
                        <label for="reg" required style="margin-right:5px;">Registration details:</label>
                        <input type="text" id="reg" name="reg" style="flex:1" value=<?php echo "'".$editee->getRegistration()."'";?> ><br>
                    </div>
                    
                    <center><input type="submit" class="submit-btn button btn-success" value="Update Event"></center>
                </div>
            </form>
        </div>
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
