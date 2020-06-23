<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>网站登录页</title>
    <link href="./css/LoginWithRegister.css" type="text/css" rel="stylesheet">
    <link href="./css/jquery.my-validate.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/jquery.my-validate.js"></script>
    <script src="./js/register.js" type="text/javascript"></script>
    <script type="text/javascript" src="./js/photo.js"></script>
    <link rel="icon" href="img/ico6.ico" type="image/x-icon"/>   <!--设置网页小图标-->
</head>
<body background="img/background16.jpg">
<div>
    <div class="header">
        <div class="container">
            <a href="suixinpei.php"><img class="logo_img" src="img/LOGO16.png"></a>
            <span><a class="font" href="./login.html">登录</a></span>
            <span><a class="font" href="./register.php">注册</a></span>
        </div>
    </div>

    <div class="container clearfix">

        <div id="register">

            <form id="login-form" role="form" method="post" action="registerDone.php" enctype="multipart/form-data">
                <legend class="legendR">用户注册</legend>

                <div class="left main-leftR">
                    <div class="form-itemR">
                        <label class="form-labelR" for="username">账号</label>
                        <?php echo '<input id="username" name="username" type="text" data-name="username" data-required="required"/> '; ?>
                        <div class="tipsR" id="userTips"></div>
                    </div>
                    <div class="form-itemR">
                        <label class="form-labelR" for="name">用户名</label>
                        <?php echo '<input id="name" name="name" type="text" data-name="name" data-required="required"/> '; ?>
                        <div class="tipsR" id="nameTips"></div>
                    </div>
                    <div class="form-itemR">
                        <label class="form-labelR" for="password">密码</label>
                        <?php echo '<input id="password" name="password" type="password" data-name="password" data-required="required"/> '; ?>
                        <div class="tipsR" id="pwdTips"></div>
                    </div>
                    <div class="form-itemR">
                        <label class="form-labelR" for="phone">电话</label>
                        <?php echo '<input id="phone" name="phone" type="text" data-name="phone" data-required="required"/> '; ?>
                        <div class="tipsR" id="phoneTips"></div>
                    </div>
                    <div class="form-itemR">
                        <label class="form-labelR" for="address">地址</label>
                        <?php echo '<input id="address" name="address" type="text" data-name="address" data-required="required"/> '; ?>
                        <div class="tipsR" id="addTips"></div>
                    </div>
                </div>
                <div class="right main-rightR">
                    <div class="form-itemR">
                        <img class="img photo" src="">
                        <input class="a" type="file" name="photo" id="photo">
                    </div>
                    <div class="proR">
                        <input type="checkbox" value=""/>我已阅读并同意<a>《平台用户协议》</a>
                    </div>
                    <div class="form-itemR">
                        <button disabled="disabled">注册</button>
                    </div>
                </div>
                <?php echo '<input name="id" type="hidden">'; ?>
            </form>

        </div>
    </div>
</div>

<div class="footer">
    <div class="container foot">版权所有  售后联系方式</div>
</div>

</body>
</html>