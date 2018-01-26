
<?php
$conn = new mysqli("localhost","rania","rania2017");
//localhost","rania","rania2017","Cafeteria
mysqli_select_db($conn,"Cafeteria");
if ($conn->connect_errno) {
trigger_error($conn->connect_error);
} ?>