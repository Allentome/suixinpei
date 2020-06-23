<?php
session_start();
$id=$_SESSION["id"];
$username=$_SESSION["username"];
$goodsid=$_POST["goodsid"];
$name=$_POST["name"];
$size=$_POST["size"];
$quantity=$_POST["quantity"];
$inventory=$_POST["inventory"];
$Surplus=$inventory-$quantity;
include'../pass.php';
$stmt=$conn->prepare('UPDATE goods SET inventory=? WHERE goodsid=?');
$stmt->bind_param('ss',$Surplus, $goodsid);
$result = $stmt->execute();
$stmt1=$conn->prepare('DELETE FROM collection WHERE userID=? AND goodsID=? AND size=? ');
$stmt1->bind_param('dds', $id,$goodsid,$size);
$result1 = $stmt1->execute();
$rc=$result1->affected_rows;
echo $rc;
if($result&&$result1){
    $stmt2 = $conn->prepare('INSERT INTO orderForm (username,name,size,quantity) VALUES (?,?,?,?)');
// 参数绑定（将变量$name、$scroe、$id按顺序绑定到SQL语句“?”占位符上）
    $stmt2->bind_param('ssss', $username,$name,$size,$quantity);
//执行预编译语句
    $result2 = $stmt2->execute();
    if($result2){
    }
}else{
    echo'2';
}
?>