<?php

require_once "classes/DB.php";

$con=DB::getConnection();

$query='delete from pending_proposals where event_name="'.$_GET["q"].'"';


mysqli_query($con, $query);
echo "Record Deleted Successfully";
?>