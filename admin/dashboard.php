<?php
    /////////////////put section in every page inside admin dir///////////////
    session_start();               
    if (!$_SESSION["loggedin"]){
        header("location:../index.php");
    }
    //////////////////////////////////////////////////////////////////////////
    require_once "classes/DB.php";
    require_once "classes/StuUser.php";
    //StuUser table desc ->Uname Password Name Dept Description Contact Profile Semester
    require_once "classes/FacUser.php";
    //FacUser table desc ->Uname Password Name Dept Description Contact Profile

    $con=DB::getConnection();
    $sql= "select * from ".$_SESSION["logintbl"]." where Uname='".$_SESSION["username"]."' and password='".$_SESSION["password"]."'";
    $rs = mysqli_query($con, $sql);
    if($_SESSION["logintbl"]=="stu_user"){
        $user = new StuUser($_SESSION["username"]);
    }
    else{
        $user = new FacUser($_SESSION["username"]);
        
    }
    $deptf=mysqli_fetch_row(mysqli_query($con, "select Dept_FullName from Department where Dept_ID='".$user->getDept()."'"))[0];
    $totalnos=$user->getEventCount();
    $activenos=$user->getActiveEventCount();
    
    //use classes/event object

    if($_SESSION["logintbl"]=="fac_user"){
        $header_flag=true;
        $getid='FacID';
        $sql="select Title,EventID from events where Faculty_Coordinator='".$user->getName()."' order by Date desc";
    }
    else{
        $header_flag=false;
        $getid='StuID';
        $sql="select Title,EventID from events where Student_Coordinator='".$user->getName()."' order by Date desc";
    }
    $rs = mysqli_fetch_row(mysqli_query($con, $sql));
    if ($rs != null) {
        $recent = $rs[0];
        $recentID = $rs[1];
    }
    else{
        $recent = "N/A";
        $recentID='';
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fiesta | Dashboard</title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <?php require 'utils/scripts.php'; ?><!--js links. file found in utils folder-->
        <style>
            .profile_img{
                width: 250px;
                height: 250px;
                object-fit: cover;
                margin: 10px auto;
                border: 2px solid #cfdbd5;
                border-radius: 50%;
            }
            .profile{
                display:flex;
                flex-direction: column;
                flex-wrap: wrap;
                justify-content: space-between;
            }
            .stats{
                width:500px;
                height:125px;
                font-size:30px;

            }

            .project-summary{
                display:flex;
                flex-wrap: wrap;
                gap: 10px;
                
            }
            .quotebox{
                background:none;
                border: none;
            }
            .btn-sample{
                white-space: nowrap;
                text-overflow: ellipsis;
                overflow: hidden;
                wrap:wrap;
            }

            </style>
    </head>
    <body>
        <?php if($header_flag){require 'utils/dash_header_fac.php';} else{require 'utils/dash_header_stu.php';} ?><!--header content. file found in utils folder-->
        <div class="container">
            <div class="row-lg-12">
                <div class="profile col-lg-6 text-center">
                <img class="profile_img" src="<?php echo "profileimgs/".$user->getProfile()?>">
                <h2><?php echo $user->getName(); ?></h2>
                <h3><?php echo $deptf; ?></h3>
                <h4><?php echo $user->getDescription()?></h4>
                

                </div>
                <div class="col-lg-6 text-center project-summary" style="vertical-align:middle;">
                    <button class="stats btn btn-danger" onclick='location.href="Events.php?<?php echo $getid . "=" . $user->getName() . "&TimeTV=1";?>"'>Current Projects:<?php echo $activenos?></button><br>
                    <button class="stats btn btn-warning" onclick='location.href="Events.php?<?php echo $getid . "=" . $user->getName() . "&TimeTV=0";?>"'>Total Projects:<?php echo $totalnos?></button><br>
                    <button class="stats btn btn-primary" style="white-space:normal;" onclick='location.href="EventPage.php?event_id=<?php echo $recentID;?>"'><div class='btn-sample'>Last Project: <?php echo $recent?><br><div></button>
                </div>
            </div>

        </div>
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>


