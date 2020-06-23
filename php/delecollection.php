<?php
session_start();
$userID=$_SESSION["id"];
$goodsid=$_POST['goodsid'];
$size=$_POST['size'];
include'../pass.php';
$stmt=$conn->prepare('DELETE FROM collection WHERE userID=? AND goodsID=? AND size=? ');
$stmt->bind_param('dds', $userID,$goodsid,$size);
$result = $stmt->execute();
if($result){

}
?>