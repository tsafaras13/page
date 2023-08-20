<?php
if (isset($_GET['nameteacher'])){
include("connection.php");
mysqli_set_charset($conn,"utf8");
$nameteacher = $_GET['nameteacher'];
$result = $conn->query("SELECT nameteacher,anakoinwsh FROM anakoinwseis WHERE nameteacher='$nameteacher'");
header('Content-type: application/json');
print json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_PRETTY_PRINT);
$conn->close();}
?> 
