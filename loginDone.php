<?php
session_start();
if($_POST) {
    //接受用户登录的信息
    $username = isset($_POST['username'])? trim($_POST['username']):'';
    $password = isset($_POST['password'])? trim($_POST['password']):'';
    $password=MD5($password);
    $name = isset($_POST['name']) ? trim($_POST['name']):'';

    //条件查询数据表
   include 'pass.php';
//预编译sql insert into，避免sql注入风险
    $stmt = $conn->prepare('SELECT * from accountwithuseinfor WHERE username=? AND password=?');
// 参数绑定（将变量$name、$department、$id按顺序绑定到SQL语句“?”占位符上）
    $stmt->bind_param('ss', $username,$password);
//执行预编译语句
    $result = $stmt->execute();
    $stmt->store_result();//存储结果集
    $stmt->bind_result($id,$username,$password,$name);//绑定结果字段值 此时并未去的值
    //判断用户信息是否正确

    if ($stmt->fetch()){//判断结果集
        //保存登录信息到session，并跳转到首页
        $_SESSION['username']=$name;
        $_SESSION['id']=$id;
        header('Location:suixinpei.php');
        exit;
    }else{
        echo "<script>alert('用户名或密码输入不正确，登录失败。')</script>";
        echo'<br>5秒后返回';
        echo"<meta http-equiv='refresh' content='0; url=login.html'>";
        echo('< a href=" ">手动返回</ a>');
    }
}
require './login.html';

?>