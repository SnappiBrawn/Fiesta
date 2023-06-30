<?php
require_once "classes/DB.php";
session_start();
$con = DB::getconnection();
$deptlist=mysqli_fetch_all(mysqli_query($con, "select Dept_Name from Department"));
$eventlist = mysqli_fetch_all(mysqli_query($con, "select type_Name from event_type;"));

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
                    padding: 10px 10px 10px 10px;
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
        <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
        <div class = "content"><!--body content holder-->
            <div class = "container">
                <div class = "col-md-12" ><!--body content title holder with 12 grid columns-->
                    <h4>Got event an idea of your own?</h4><!--body content title-->
                    <h1>SUBMIT IT NOW!</h1>
                    <p>Fill in the form below and have it reach the coordinators directly.</p>
                </div>
            </div>
            <hr>
            <div class="container proposal-form">
                <form method="POST" action="ProposalSubmiter.php">
                    <div class="container sub-container">
                        <center><h2>About You</h2></center>
                        <div class="row-12-lg">
                            <div class="col-lg-6 form-section">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name">
                            </div>
                            <div class="col-lg-3">
                            <label for="dept">Department:</label>
                            <select name="dept" required> 
                                <?php for($i=0;$i<10;$i++){?>
                                <option value=<?php echo $deptlist[$i][0]; ?>><?php echo $deptlist[$i][0]; }?></option>
                            </select>
                            </div>
                            <div class="col-lg-3">
                                    <label for="sem">Semseter:</label>
                                    <select name="semseter" required>
                                        <option>1st</option>
                                        <option>2nd</option>
                                        <option>3rd</option>
                                        <option>4th</option>
                                        <option>5th</option>
                                        <option>6th</option>
                                        <option>7th</option>
                                        <option>8th</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="container sub-container">
                        <center><h2>About Your Idea</h2></center>
                        <div class="col-lg-12 form-section">
                            <label for="event_title">Name:</label>
                            <input type="text" id="event_title" name="event_title" style="display:flex; flex:1">
                        </div>
                        <div class="row-lg-6 form-section">
                            <label for="event_type">Event Type:</label>
                            <select name="event_type" >
                            <?php for($i=0;$i<7;$i++){?>
                                <option value=<?php echo "'".$eventlist[$i][0]."'"; ?>><?php echo $eventlist[$i][0]; }?></option>
                            </select>
                        </div>
                        <div class="row-lg-12" style="display:flex; flex-direction:column; padding:0px 30px 0px 30px;">
                            <label for="desc">Event Description:</label>
                            <textarea id="desc" name="desc" cols="5" rows="10" ></textarea><br>    
                        </div>
                        <div class="row-lg-12 form-section">
                            <label for="imgs">Supporting Images<small><i>(Kindly limit to 5)</i></small>:</label>
                            <input type="file" id="imgs" name="imgs[]" accept="image/*" multiple>
                        </div>
                        <p style="font-size:10px"></p>
                    </div>
                    <center><button type="submit" name="createLocation" class="btn btn-default btn-lg">Send Proposal<span class="glyphicon glyphicon-send size-large"></span></button></center>
            
                </form>
            </div>
			
        </div><!--body content div-->
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
