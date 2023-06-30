<?php

require_once "classes/DB.php";

$con=DB::getConnection();

$query="delete from events where EventID=".$_GET["q"]."";
echo $query;

mysqli_query($con, $query);
header("ShowEvents.php");

?>