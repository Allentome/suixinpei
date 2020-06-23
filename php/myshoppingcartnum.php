<?php
session_start();
$id=$_SESSION["id"];
include '../pass.php';
$result =$conn->query("select count(*) AS quantity from collection WHERE userid=$id");
$row =$result->fetch_array();
if($result){
    echo $row[0];
}
$result->free();
$conn->close();
?>