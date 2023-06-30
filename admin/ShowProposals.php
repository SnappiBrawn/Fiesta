<?php
    /////////////////put section in every page inside admin dir///////////////
    session_start();               
    if (!$_SESSION["loggedin"]){
        header("location:../index.php");
    }
    //////////////////////////////////////////////////////////////////////////
    require_once "classes/DB.php";
    require_once "classes/StuUser.php";
    require_once "classes/Proposal.php";
    //StuUser table desc ->Uname Password Name Dept Description Contact Semester


    $con=DB::getConnection();

if (isset($_POST[""])) {
}
    //use classes/event object
    $current_dept=mysqli_fetch_row(mysqli_query($con,"select Dept from stu_user where Uname='".$_SESSION["username"]."'"))[0];

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
        <title>Fiesta | Proposals</title>
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
                        alert(this.responseText);
                        }
                    };
                xhttp.open("GET","deleteProposal.php?q="+ele,true);
                xhttp.send();
            }
            
            function view(ele){
                window.location.href= "ViewProposal.php?id="+ele;
            }
        </script>
        <?php if($header_flag){require 'utils/dash_header_fac.php';} else{require 'utils/dash_header_stu.php';} ?><!--header content. file found in utils folder-->
        <div class="container">
            <table class="table table-striped table-hover">
                <thead class="thead" style="background-color: #82f38f ; border: #d3e9d3 1px solid; ">
                    <th id="test">Sl. no</th>
                    <th>Author</th>
                    <th>Department</th>
                    <th>Event Title</th>
                    <th>Type</th>
                    <th>View</th>
                    <th>Delete</th>
                </thead>
                <?php 
                    $query="select * from Pending_Proposals";
                    $res=mysqli_fetch_all(mysqli_query($con,$query));
                    for($i=0;$i<count($res);$i++){
                        $prop=new Proposal($res[$i]);
                        echo "<tr scope='row'>";
                            echo "<td>".($i+1)."</td>";
                            echo "<td>".$prop->getAuthor()."</td>";
                            echo "<td>".$prop->getDeptName()."</td>";
                            echo "<td>".$prop->getEvent_Name()."</td>";
                            echo "<td>".$prop->getTypeName()."</td>";
                            echo "<td><input class='btn btn-success' type='submit' value='View' id='".$prop->getEvent_Name()."' onclick='view(this.id)'></input></td>";
                            echo "<td><input class='btn btn-danger' type='submit' value='Delete' id='".$prop->getEvent_Name()."' onclick='del(this.id)'></input></td>";
                        echo "</tr>";
                    
                    }
                ?>
            </table>
        </div>
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
