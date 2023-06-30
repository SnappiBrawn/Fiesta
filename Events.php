<?php
    session_start();
    //$_SESSION["loggedin"]=false;

include_once "classes/DB.php";
include_once "classes/StuUser.php";
include_once "classes/Event.php";
include_once "classes/FacUser.php";

$con= DB::getConnection();
if (isset($_GET['dept'])) {
    $query = "select * from events where department='" . $_GET['dept'] . "' order by date desc";
}
elseif(isset($_GET['StuID'])){
    if ($_GET['TimeTV']==0) {
        $query = "select * from events where Student_Coordinator='" . $_GET['StuID'] . "'";
    }
    else{
        $query = "select * from events where Student_Coordinator='" . $_GET['StuID'] . "' and Status=1";
    }
}
elseif(isset($_GET['FacID'])){
    if ($_GET['TimeTV']==0) {
        $query = "select * from events where Faculty_Coordinator='" . $_GET['FacID'] . "'";
    }
    else{
        $query = "select * from events where Faculty_Coordinator='" . $_GET['FacID'] . "' and Status=1";
    }
}
else{
    $query = "select * from events order by date desc";
}

$eventlist = mysqli_fetch_all(mysqli_query($con,$query));

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fiesta | Events</title>
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
            align-content:center;
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

    </style>
    
    </head>
    <body>
        <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
        <div class="container">
            <h1 class="text-center display-1">Upcoming</h1>
        </div>
            <?php if (count($eventlist)==0){
                echo "<h1 class='font-italic text-center' style='font-family:fantasy'>Oops, such empty here...</h1>";
            } 
            foreach($eventlist as $event){
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
            </div>
        </div>
        <?php }?>
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
