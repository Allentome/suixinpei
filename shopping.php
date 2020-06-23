<?php
session_start();
//$id =$_POST["id"];
$goodsid=$_POST["goodsid"];
$id=$_SESSION["id"];
//$collecttionid =$_SESSION["collectionid"];
echo $_POST["goodsid"];
//连接数据库
include'pass.php';
//预编译sql update语句，避免sql注入风险
// 预处理SQL模板

$stmt = $conn->prepare('INSERT INTO shoppingcart (goodsid,id) VALUES (?,?)');
//INSERT INTO renyuan (name,department,shenid,phone,telephone,email,origin,address,Socialnumber) VALUES (?,?,?,?,?,?,?,?,?)
// 参数绑定（将变量$name、$scroe、$id按顺序绑定到SQL语句“?”占位符上）
$stmt->bind_param('ss', $goodsid,$id);
//执行预编译语句
$result= $stmt->execute();
var_dump($result);
if ($result) {

    echo '成功';
    header('Location:gouwuche.php');
}else{
    echo "<script>alert('你已经收藏此歌')</script>";
    header('Location:like.php');
}

$result->free();;
/* Close the connection 关闭连接*/
$conn->close();
?>
