<?php
session_start();

    require_once 'classes/DB.php';
    $dept = $_POST['dept'];
    $name = $_POST['name'];
    $title = $_POST['event_title'];
    $event_type = $_POST['event_type'];
    $desc = htmlspecialchars($_POST['desc'],ENT_QUOTES);
    $imgs = $_POST['imgs'];
    $con=DB::getConnection();
    if(!$con){
        die("Connection failed".mysqli_connect_error());
    }
$file_names = '';
foreach ($_POST['imgs'] as $file) {
    $file_names = $file_names.$file.' ';
}
$sql = "select dept_id from department where dept_name ='" . $dept . "'";
$dept = mysqli_fetch_row(mysqli_query($con, $sql))[0];
$sql = "select etype_id from event_type where type_name ='" . $event_type . "'";
$event_type = mysqli_fetch_row(mysqli_query($con, $sql))[0];
    $sql = 'insert into pending_proposals values("'.$title.'","'.$name.'","'.$dept.'","'.$desc.'","'.trim($file_names).'","'.$event_type.'",0)';
    $rs = mysqli_query($con, $sql);
    header("Location:Proposal.php");
    echo "<script>alert('Proposal Submitted');</script>";
    ?>
<html>
    </html>
