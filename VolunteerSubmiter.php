<?php
session_start();

    require_once 'classes/DB.php';

    $dept = $_POST['dept'];
    $eventid=$_POST['eventid'];
    $name = $_POST['name'];
    $sem = $_POST['sem'];
    $desc = htmlspecialchars($_POST['desc'],ENT_QUOTES);

    $con=DB::getConnection();
    $sql = "select dept_id from department where dept_name ='" . $dept . "'";
    $dept = mysqli_fetch_row(mysqli_query($con, $sql))[0];

    $query='insert into volunteerlist values("'.$eventid.'","'.$name.'","'.$dept.'","'.$sem.'","'.$desc.'")';
    mysqli_query($con,$query);

    
    header("Location:Index.php?msg=Thank you for volunteering!");
    echo $query;
    echo "<script>alert('Proposal Submitted');</script>";

    ?>
<html>
    </html>
