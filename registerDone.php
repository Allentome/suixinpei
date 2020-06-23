<?php
echo '基于对象的php mysqli 添加';
//获取http post请求的参数
$username = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["name"];
$address = $_POST["address"];
$phone = $_POST["phone"];

$id = $_POST["id"];

// 将允许的文件扩展名放在数组$alloweExtst中
$allowedExts = array("jpeg", "jpg", "png");
$temp = explode(".", $_FILES["photo"]["name"]);
// 获取文件后缀名
$extension = end($temp);
echo $extension;
if ((($_FILES["photo"]["type"] == "image/gif")
    || ($_FILES["photo"]["type"] == "image/jpeg")
    || ($_FILES["photo"]["type"] == "image/jpg")
    || ($_FILES["photo"]["type"] == "image/pjpeg")
    || ($_FILES["photo"]["type"] == "image/x-png")
    || ($_FILES["photo"]["type"] == "image/png"))
&& ($_FILES["photo"]["size"] < 200*1024)
&& in_array($extension, $allowedExts)
&&($_FILES["photo"]["error"] == 0)
) {
//按照命名规范重新命名，并上传
    $filename =  $name . '.' . $extension;
    move_uploaded_file($_FILES["photo"]["tmp_name"], "./img/" . $filename);
}

include'pass.php';
//预编译sql insert into，避免sql注入风险
$stmt = $conn->prepare('INSERT INTO account(username,password) VALUES (?,?)');
    $stmt1 = $conn->prepare('INSERT INTO userinformation(name,address,phone,headPortrait) VALUES (?,?,?,?)');
// 参数绑定（将变量$name、$department、$id按顺序绑定到SQL语句“?”占位符上）
$stmt->bind_param('ss', $username,$password);
$stmt1->bind_param('ssss', $name,$address,$phone,$filename);
//执行预编译语句
$result = $stmt->execute();
$result1 = $stmt1->execute();
if ($result&&$result1) {
    header("Location:login.html");
}else{
    echo '不成功';
}
/* Destroy the result set and free the memory used for it 结束查询释放内存 */
$result->free();
/* Close the connection 关闭连接*/
$conn->close();
?>

