<?php
    /////////////////put section in every page inside admin dir///////////////
    session_start();               
    if (!$_SESSION["loggedin"]){
        header("location:../index.php");
    }
    //////////////////////////////////////////////////////////////////////////
    require_once "classes/DB.php";
    require_once "classes/Event.php";
    require_once "classes/FacUser.php";
    //StuUser table desc ->Uname Password Name Dept Description Contact Semester


    $con=DB::getConnection();
    $tableview=true;
    if( isset($_POST['mine']) )
    {
    $tableview = false;
    }
    if(isset($_POST["ours"])){
    $tableview = true;
    }

if (isset($_POST[""])) {
}
    //use classes/event object
    $current_dept=mysqli_fetch_row(mysqli_query($con,"select Dept from fac_user where Uname='".$_SESSION["username"]."'"))[0];

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
        <title>Fiesta | Events</title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <?php require 'utils/scripts.php'; ?><!--js links. file found in utils folder-->
        <style>
            td, th{
                text-align: center;
                border: 1px #baeebd solid;            
            }
            
            .button{
                border:none;
                background: inherit;
            }
            .button:after{
                border:2px solid black;
            }

            .table{
                border-radius:15px;
                overflow: hidden;
                border: #baeebd 3px solid; 
            }

            .opts{
                display: flex;
                flex-direction:row;
                vertical-align: center;
                text-align:center;
            }

            a{
                padding:5px 0px 0px 10px;
                line-height:-1px;
                color: #333333;
                border: 1px solid transparent;
            }
            
            a:hover{
                color: #333333;
                text-decoration: inherit;

            }
        </style>
    </head>
    <body>
        <script>
            function del(ele){
                var xhttp=new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        window.history.go(0);
                        alert("Record removed successfully");
                        //document.getElementById("test").innerHTML = this.responseText;
                        }
                    };
                xhttp.open("GET","deleteEvent.php?q="+ele,true);
                xhttp.send();
            }
            function done(ele){
                var xhttp=new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        window.history.go(0);
                        alert("Event Marked done.");
                        document.getElementById("test").innerHTML=this.responseText;
                    }
                }
                xhttp.open("GET","CompleteEvent.php?q="+ele,true);
                xhttp.send();
            }
            function edit(ele){
                window.location.href= "EditEvent.php?id="+ele;
            }
            function vollst(ele){
                window.location.href= "VolunteerList.php?id="+ele;
            }

        </script>
        <?php if($header_flag){require 'utils/dash_header_fac.php';} else{require 'utils/dash_header_stu.php';} ?><!--header content. file found in utils folder-->
        <div class="container">
            <div class="container opts">
                <form action="ShowEvents.php" method="post"><button class="button btn" type="submit" name="ours">All Events</button>
                <button type="submit" class="button btn" name="mine">My Events</button></form>
                <a href="AddEvent.php">Add Event</a>
            </div>
            <table class="table table-striped table-hover">
                <thead class="thead" style="background-color: #82f38f ; border: #d3e9d3 1px solid; ">
                    <th id="test">Sl. no</th>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Faculty Coordinator</th>
                    <th>Student Coordinator </th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Mark Done</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Volunteers</th>
                </thead>
                <?php 
                    if($tableview){
                        $query="select * from events";
                    }
                    else{
                        $query="select * from events where Department='".$current_dept."'";
                    }
                    $res=mysqli_fetch_all(mysqli_query($con,$query));
                    for($i=0;$i<count($res);$i++){
                        $event=new Event($res[$i]);
                        echo "<tr scope='row'>";
                            echo "<td>".($i+1)."</td>";
                            echo "<td>".$event->getTypeName()."</td>";
                            echo "<td>".$event->getTitle()."</td>";
                            echo "<td>".$event->getDeptName()."</td>";
                            echo "<td>".$event->getFaculty_Coordinator()."</td>";
                            echo "<td>".$event->getStudent_Coordinator()."</td>";
                            echo "<td>".$event->getDate()."</td>";
                            echo "<td>".($event->getStatus()?"Active":"Completed")."</td>";
                            echo "<td><input class='btn btn-primary' type='submit' value='".($event->getStatus()?"Done":"Undo")."' id='".$event->getEventID()."' onclick='done(this.id)'></input></td>";
                            $_SESSION["editing"]=$event->getEventID();
                            echo "<td><input class='btn btn-success' type='submit' value='Edit' id='".$event->getEventID()."' onclick='edit(this.id)'></input></td>";
                            echo "<td><input class='btn btn-danger' type='submit' value='Delete' id='".$event->getEventID()."' onclick='del(this.id)'></input></td>";
                            echo "<td><input class='btn btn-super' type='submit' value='View List' id='".$event->getEventID()."' onclick='vollst(this.id)'></input></td>";
                        echo "</tr>";
                    
                    }
                ?>
            </table>
        </div>
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
