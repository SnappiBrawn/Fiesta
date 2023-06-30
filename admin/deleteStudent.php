<?php

require_once "classes/DB.php";

$con=DB::getConnection();

$query="delete from Stu_user where uname='".$_GET["q"]."'";
echo $query;

mysqli_query($con, $query);

?>