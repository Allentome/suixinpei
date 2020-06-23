<?php
$user = isset($_POST['username'])? trim($_POST['username']):'';
include '../pass.php';
$result = $conn->query("select * from account WHERE username='$user'");
if($result){
    if (is_array($result->fetch_row())) {//把查询结果返回到数组中  is_array()函数检测变量是否是一个数组
        echo '1';
    }
    else {
        echo '0';
    }
    $result->free();
}
$conn->close();
exit();


?>