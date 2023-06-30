<?php
require_once "classes/DB.php";
require_once "classes/Proposal.php";
$con = DB::getconnection();
$deptlist=mysqli_fetch_all(mysqli_query($con, "select Dept_Name from Department"));
$eventlist = mysqli_fetch_all(mysqli_query($con, "select type_Name from event_type;"));
$res = mysqli_fetch_row(mysqli_query($con, 'select * from pending_proposals where Event_name="'.$_GET["id"].'"'));
$prop = new Proposal($res);
$media = explode(" ",$prop->getMedia());
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fiesta | Proposal</title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <?php require 'utils/scripts.php'; ?><!--js links. file found in utils folder-->

        <style>
                .proposal-form{
                    font-size: x-large;
                    font-family: serif;
                }
                .form-section{
                    display: flex;
                    color: #2C3E50;
                    gap: 10px;
                    align-items: center;
                    line-height:0.7;
                    padding: 0px 30px 0px 30px;
                }
                .sub-container{
                    padding: 0 10px 10px 10px;
                    display:flex;
                    flex-direction:column;
                    gap:20px;
                    border: #babdbfab 1px solid;
                    border-radius: 15px;
                    margin:20px;
                }
            </style>
    </head>
    <body>
        <?php require 'utils/dash_header_stu.php'; ?><!--header content. file found in utils folder-->
        <div class = "content"><!--body content holder-->

            <div class="container proposal-form">
                <div class="container sub-container">
                    <center><h2>Author Details</h2></center>
                    <div class="row-12-lg">
                        <div class="col-lg-6 form-section">
                            <label for="name">Name:</label>
                            <label class="fetched" name="name"><?php echo $prop->getAuthor();?></label>
                        </div>
                        <div class="col-lg-3">
                        <label for="dept">Department:</label>
                        <label class="fetched" name="dept"><?php echo $prop->getDeptName();?></label>
                        </div>
                    </div>
                </div>
                <div class="container sub-container">
                    <center><h2>Proposal</h2></center>
                    <div class="row-lg-12 form-section">
                        <label for="title">Title:</label>
                        <label name="title" style="display:flex; flex:1"><?php echo $prop->getEvent_Name(); ?> </label>
                    </div>
                    <div class="row-lg-6 form-section">
                    <label for="event_type">Event Type:</label>
                    <label class="fetched" name="event_type" ><?php echo $prop->getTypeName();?></label>
                    </div>
                    <div class="row-lg-12" style="display:flex; flex-direction:column; padding:0px 30px 0px 30px;">
                        <label for="desc">Event Description:</label>
                        <textarea id="desc" name="desc" cols="5" rows="10" readonly><?php echo $prop->getDescription();?></textarea><br>    
                    </div>
                    <div class="row-lg-12 form-section">
                        <label for="imgs">Supporting Images:</label>
                    </div>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                        <?php
                        for ($index = 0; $index < count($media)-1; $index++) {
                            ?>
                            <div class="item">
                                <img src=<?php echo "../proposalimgs/".$media[$index];?>>
                            </div>
                        <?php }?>
                            <div class="item active">
                                <img src=<?php echo "../proposalimgs/".$media[$index];?>>
                        </div>
                        <?php if (count($media) > 1) { ?>
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                        <?php }?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
