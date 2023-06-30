<?php
require_once "classes/DB.php";
require_once "classes/Event.php";
$con = DB::getconnection();
$res = mysqli_fetch_row(mysqli_query($con, 'select * from Events where EventID='.$_GET["event_id"]));
$prop = new Event($res);
$tagline = mysqli_fetch_row(mysqli_query($con, 'select tagline from event_type where Etype_id="' . $prop->getType() . '"'))[0];
//$media = explode(" ",$prop->getMedia());
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fiesta | Proposal</title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <?php require 'utils/scripts.php'; ?><!--js links. file found in utils folder-->

        <style>
            .bgimg{
                background-image:radial-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url(eventimgs/<?php echo $prop->getImage();?>);
                background-blend-mode: multiply;
                background-size: cover;
                background-position: center center;
                height: 400px;
                margin-bottom: 29px;
            }
            .content{
                display:flex; 
                flex-direction:column;
                border:#766565 1px solid;
                box-shadow:0px 0px 2px;
                border-radius:12px;
                margin:30px;
                
            }
            .content *{
                display:flex; 
                justify-content:center; 
                gap:100px;
                flex:1;
                padding:10px;
                font-size: 25px;
            }
            textarea:focus {
                outline: 0;
            }
            .buttonnext {
            background-color: #c2fbd7;
            border-radius: 100px;
            box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
            color: green;
            font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
            padding: 7px 20px;
            text-align: center;
            transition: all 250ms;
            border: 0;
            font-size: 22px;
            }
            .buttonnext:hover {
            box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
            transform: scale(1.05) rotate(-2deg);
            }
            </style>
    </head>
    <body>
    <header class="bgimg">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header"><!--website name/title-->
                    <a href = "index.php" class = "navbar-brand">
                        Fiesta - College EMS
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right"><!--navigation-->
                    <?php 
                        echo '<li><a href = "index.php">Home</a></li>';
                        echo '<li><a href = "Department.php">Departments</a></li>';
                        echo '<li><a href = "Proposal.php">Proposal</a></li>';
                        echo '<li><a href = "login_form.php">Login</a></li>';
                    ?>
                </ul>
            </div>
        </nav>
        <div class = "col-md-12">
            <div class = "container">
                <div class = "jumbotron">
                    <h1><?php echo $prop->getTitle();?></h1>
                    <h3>Organized by Department of <?php echo $prop->getDeptFName();?></h3>
                    <h3>"<?php echo $tagline;?>"</h3>
                    <div class='row-lg-12' style='display:flex; justify-content: center; gap:200px; padding:20px;'>
                        <p>Faculty Coordinator: Prof. <?php echo $prop->getFaculty_Coordinator();?></p>
                        <p>Student Coordinator: <?php echo $prop->getStudent_Coordinator();?></p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class='row-lg-12 content'>
        <div class='row-lg-12'>
            <div class='col-lg-6'>
                <strong><p>When: <?php echo $prop->getDate();?></p>
            </div>
            <div class='col-lg-6'>
                <p>Where: <?php echo $prop->getVenue();?></p></strong>
            </div>
        </div>
        <label for='desc' style='display:flex; justify-content:left; padding-left:20px;'>Event Info:</label>
        <div class='row-lg-12'>
                <textarea style="border:none; cursor:auto; height:300px" readonly><?php echo $prop->getDescription();?></textarea>
        </div>
        <label style='cursor:inherit;'>Registration link:- <?php echo $prop->getRegistration();?></label>
    </div>
    <center><button class='buttonnext' onclick='location.href="VolunteerSubmission.php?q=<?php echo $prop->getEventID()?>"'>I wanna Volunteer<span class="glyphicon glyphicon-menu-right"></span></button></center>
    <?php require 'utils/footer.php'; ?>
    </body>
</html>
