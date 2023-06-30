<?php

    require_once "classes/Event.php";
    require_once "classes/DB.php";

if(isset($_POST)){

    ///echo "<script>alert('moshi moshii ingga saan');</script>"; USE THIS TO SEND POP-UPS
    $con = DB::getConnection();
    $q = "select dept_id from department where dept_name='".$_POST["dept"]."'";
    $dept=mysqli_fetch_row(mysqli_query($con,$q))[0];
    $q = "select etype_id from event_type where type_Name='".$_POST["event_type"]."'";
    $type=mysqli_fetch_row(mysqli_query($con,$q))[0];
    $desc=htmlspecialchars($_POST['desc'],ENT_QUOTES);
    $asd = [$_POST["eid"], $type, $_POST["event_title"], $dept, $_POST["fc"], $_POST["sc"], $desc, $_POST["date"], $_POST["venue"], $_POST["reg"], 1,$_POST["img"]];
    $event = new Event($asd);
    $event->addEvent();
    header("location:ShowEvents.php");
}




?>