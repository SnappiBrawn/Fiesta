<?php

require_once "classes/DB.php";

$con=DB::getConnection();
$query = "select Status from events where EventID=" . $_GET["q"];
$current_state = mysqli_fetch_row(mysqli_query($con, $query))[0];
$fl = ($current_state) ? "0" : "1";

$query = "update events set Status=".$fl." where EventID=". $_GET["q"];
mysqli_query($con, $query);
echo $query;
header("ShowCoordinators.php");

?>