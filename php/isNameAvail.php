<?php
$name = isset($_POST['name'])? trim($_POST['name']):'';
include '../pass.php';
$result = $conn->query("select * from userinformation WHERE name='$name'");
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