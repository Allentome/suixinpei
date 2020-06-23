<?php
session_start();
$id=$_SESSION["id"];
$goodsid=$_POST['goodsid'];
$size=$_POST['size'];
include '../pass.php';

//预编译sql update语句，避免sql注入风险
// 预处理SQL模板

$result = $conn->query("select * from collection WHERE userID='$id'and goodsid='$goodsid' AND size='$size'");
if ($result) {
    if (is_array($result->fetch_row())) {//把查询结果返回到数组中  is_array()函数检测变量是否是一个数组
        echo '1';
    }
    else {

        $stmt = $conn->prepare( 'INSERT INTO collection (userID,goodsID,size) VALUES (?,?,?)');
//INSERT INTO renyuan (name,department,shenid,phone,telephone,email,origin,address,Socialnumber) VALUES (?,?,?,?,?,?,?,?,?)
// 参数绑定（将变量$name、$scroe、$id按顺序绑定到SQL语句“?”占位符上）
        $stmt->bind_param('sss', $id,$goodsid,$size);
//执行预编译语句
        $result1= $stmt->execute();
        echo '0';
    }
}else{
   echo'失败';
}

/* Close the connection 关闭连接*/
$conn->close();
?>