<?php
    session_start();
    $_SESSION["loggedin"]=false;

include_once "classes/DB.php";
include_once "classes/Event.php";

$con = DB::getConnection();
$eventlist = mysqli_fetch_all(mysqli_query($con, "select * from events"));

if(isset($_GET['msg']));
    echo "<script>alert('".$_GET['msg']."');</script>";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fiesta | Home</title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <?php require 'utils/scripts.php'; ?><!--js links. file found in utils folder-->
        <style>
        .card{
            display:flex;
            flex:1 0 0;
            margin:30px;
            padding:5px;
            border:solid 1px #d2dfdd;
            border-radius: 30px;
            box-shadow: 0px 0px 5px;
            height:25rem;
        }
        .card:hover{
            cursor: pointer;
        }
        .image{
            display: flex;
            flex: 1 0 auto;
        }
        .content{
            display: flex;
            flex-direction: column;
            flex: 1 0 auto;
            padding: 10px 0px 0px 150px;
        }
        .time{
            display:flex;
            flex: 1 0 auto;
            flex-direction: column;
            row-gap:-10px;
            font-family: monospace;
            align-content: flex-start;
            margin: 0px;
            align-items:center;
            text-transform: uppercase;
        }
        .title{
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            wrap:wrap;
        }
        .image *{
            border-radius: 20px;
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
        <?php require 'utils/header.php'; ?>
            <div class="container">
                    <h1>What's On</h1>
                </div>
            <?php foreach($eventlist as $event){
                $event = new Event($event);
            ?>
            <div class='row-lg-12'>
                <div class='card' onclick="location.href = 'EventPage.php?event_id=<?php echo $event->getEventID();?>'">
                    <div class='col-lg-2 time'> 
                        <h1 style='font-size:90px; text-transform:lowercase'><?php echo date('d',strtotime($event->getDate())); ?></h1>
                        <h3 style='margin:0px;'><?php echo date('F',strtotime($event->getDate())); ?></h3>
                        <h4><?php echo date('l',strtotime($event->getDate())); ?></h4>
                    </div>
                    <div class='col-md-3 image'>  
                        <img src='eventimgs/<?php echo $event->getImage();?>' alt='No Cover Photo Uploaded'>
                    </div>
                    <div class='col-md-7 content'>  
                        <h2 class='title'><?php echo $event->getTitle();?></h2>
                        <h4><?php echo $event->getDeptName();?></h4>
                        <p>Venue: <?php echo $event->getVenue();?></p>
                        <p>Faculty Coordinator: Prof.<?php echo $event->getFaculty_Coordinator();?></p>
                        <p>Student Coordinator: <?php echo $event->getStudent_Coordinator();?></p>
                    </div>
                </div>
            </div> </div>
            <?php } ?>
        <center><button class='buttonnext' onclick='location.href="Events.php"'>All Events<span class="glyphicon glyphicon-menu-right"></span></button></center>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
