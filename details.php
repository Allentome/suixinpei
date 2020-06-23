<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

    <link rel="icon" href="img/ico6.ico" type="image/x-icon"/>   <!--设置网页小图标-->
    <title>详情页</title>

    <meta charset="utf-8">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/details.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/head.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/demo1.js"></script>
    <script type="text/javascript" src="js/jia.js"></script>
    <!--    <script type="text/javascript" src="js/slide.js"></script>-->
    <!--放大镜js、css-->
    <script src="js/bigjs/common.js"></script>
    <link href="css/bigcss/common.css" rel="stylesheet" type="text/css"/>
    <!--置顶-->
    <link rel="stylesheet" href="css/allen1.css">
    <script type="text/javascript" src="js/ziding.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var showproduct = {
                "boxid": "showbox",
                "sumid": "showsum",
                "boxw": 400,//宽度,该版本中请把宽高填写成一样
                "boxh": 400,//高度,该版本中请把宽高填写成一样
                "sumw": 60,//列表每个宽度,该版本中请把宽高填写成一样
                "sumh": 60,//列表每个高度,该版本中请把宽高填写成一样
                "sumi": 7,//列表间隔
                "sums": 5,//列表显示个数
                "sumsel": "sel",
                "sumborder": 1,//列表边框，没有边框填写0，边框在css中修改
                "lastid": "showlast",
                "nextid": "shownext"
            };//参数定义
            $.ljsGlasses.pcGlasses(showproduct);//方法调用，务必在加载完后执行
        });
    </script>
</head>

<body>

<!--logo-->
<div class="header">
    <div class="container1 clearfix">
        <img class="logo-img" src="img/logo16.png">
        <!--        <span><a href="login.html" class="h-register">登录</a></span>-->
        <!--        <span><a href="logout.php" class="h-register">注册</a></span>-->
        <?php

        if (isset($_SESSION['username'])) {
//                echo '欢迎  '.$_SESSION['username'];
            echo '<span   class="h-registers"><a href="logout.php" class="h-register">退出</a></span>';
            echo '<span   class="h-registers"><a href="#" class="h-register">' . $_SESSION['username'] . '</a></span>';
        } else {
            echo '<span   class="h-registers"><a href="login.html" class="h-register">登录</a></span>
            <span class="h-registers">
                <a href="register.php" class="h-register">注册</a></span>';

        } ?>
        <div class="search bar7">
            <form class="clearfix"method="post"action="search.php">
                <input type="text" placeholder="请搜索衣服" name="crid"id="crid">
                <button type="submit"></button>
            </form>
        </div>

    </div>
</div>
<!--导航-->
<div class="h-nav-bg">
    <div class="container1">
        <nav class="h-nav">
            <ul class="clearfix">
                <li class="h-nav-a-bg">
                    <a href="suixinpei.php" class="h-nav-a">首页</a>
                </li>
                <li class="h-nav-a-bg">
                    <a href="suixinpei.php" class="h-nav-a">推荐</a>
                </li>
                <li class="h-nav-a-bg">
                    <a href="#" class="h-nav-a">男装</a>
                    <div class="h-dropdown">
                        <div><a class="h-dropdown-a" href="#">上衣</a></div>
                        <div><a class="h-dropdown-a" href="#">裤子</a></div>
                        <div><a class="h-dropdown-a" href="#">夏装</a></div>
                    </div>
                </li>
                <li class="h-nav-a-bg">
                    <a href="#" class="h-nav-a">女装</a>
                    <div class="h-dropdown">
                        <div><a class="h-dropdown-a" href="#">上衣</a></div>
                        <div><a class="h-dropdown-a" href="#">裤子</a></div>
                        <div><a class="h-dropdown-a" href="#">夏装</a></div>
                    </div>
                </li>
                <li class="h-nav-a-bg">
                    <a href="gouwuche.php" class="h-nav-a">购物车</a>
                </li>
                <li class="h-nav-a-bg">
                    <a href="diyindex.php" class="h-nav-a">Diy搭配</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<article>

    <?php
    $goodsid = $_GET['goodsid'];
    //    $goodsid='8';
    //    echo '<div style="color: white;">'.$goodsid.'</div>';
    //连接数据库
   include'pass.php';
    //向数据库发送sql指令，获得结果集
    $result = $conn->query("SELECT * FROM detail where Goodsid = '$goodsid'");
    $result1 = $conn->query("SELECT * FROM detail where Goodsid = '$goodsid'");
    if ($result && $result1) {
    //print("Very large cities are: ");
    /* Fetch the results of the query 返回查询的结果 */
    ?>

    <div class="detail_box container1">
        <div class="detail_show">
            <!--页面必要代码,img标签上请务必带上图片真实尺寸px-->
            <div id="showbox" style="border: 1px solid #d79906">

                <?php
                while ($row1 = $result1->fetch_assoc()) {
                    ?>
                    <!--                    if($row['id'] == $_SESSION['id']){-->
                    <!--                    echo''-->
                    <img src="totalimg/<?php echo $row1['detailedpicture'] ?>.png" width="270" height="180"/>
                    <img src="totalimg/<?php echo $row1['detailedpicture'] ?>.png" width="270" height="180"/>
                    <img src="totalimg/<?php echo $row1['detailedpicture'] ?>.png" width="270" height="180"/>
                    <img src="totalimg/<?php echo $row1['detailedpicture'] ?>.png" width="270" height="180"/>
                    <img src="totalimg/<?php echo $row1['detailedpicture'] ?>.png" width="270" height="180"/>
                    <img src="totalimg/<?php echo $row1['detailedpicture'] ?>.png" width="270" height="180"/>
                    <!--                    <img  src="img/images/photos/--><?php //echo $row1['mainpicture'] ?><!--" width="270" height="180"/>-->
                    <?php
                }
                ?>

            </div>

            <!--展示图片盒子-->
            <div id="showsum"></div>
            <!--展示图片里边-->
            <p class="showpage">
                <a href="javascript:void(0);" id="showlast"
                   style="background-color: black;color: white;border: 1px solid #d79906"><</a>
                <a href="javascript:void(0);" id="shownext"
                   style="background-color: black;color: white;border: 1px solid #d79906"> > </a>
            </p>
        </div>
        <?php
        $row = $result->fetch_assoc();
        ?>
        <div class="detail_ifo">
            <form action="" method="post" class="detail_ifo">
                <input name="goodsid" type="hidden" value="<?php echo $row['Goodsid'] ?>">

                <span class="detail_name"><?php echo $row['Name'] ?></span>
                <span class="detail_type"><?php echo $row['Type'] ?><?php echo $row['Introduction'] ?></span>
                <div class="detail_price">
                    <div class="detail_price_left">
                        <span>价格</span>
                        <span style="color: white;font-size: 2em">¥<?php echo $row['Price'] ?></span>
                    </div>
                </div>
                <div class="detail_distribution"><span>配送</span><span
                            style="margin-left: 30px">广东广州 至 广东深圳 快递 免运费 </span></div>
                <div class="detail_size">
                    <p style="display: inline-block; float: left">尺码</p>
                    <div>
                        <select name="size">
                            <option value="S">S码</option>
                            <option value="M">M码</option>
                            <option value="L">L码</option>
                        </select>
                    </div>
                </div>
                <div class="detail_inventory">
                    <span>库存</span>
                    <div>
                        <span>S(<?php echo $row['S'] ?>)</span>
                        <span>M(<?php echo $row['M'] ?>)</span>
                        <span>L(<?php echo $row['L'] ?>)</span>
                    </div>
                </div>
                <div class="detail_amount">
                    <span>数量</span>
                    <div>
                        <a href="#"><span style="background-color: black" class="minus">-</span></a>
                        <a href="#"><span style="width: 50px" class="amount">1</span></a>
                        <a href="#"><span style="background-color: black" class="add">+</span></a>
                    </div>
                </div>

                <div class="detail_btn">
                    <input type="submit" value="立即购买" class="detail_btna">
                    <input type="button" value="加入购物车" class="detail_btnb btn">
                </div>
            </form>
        </div>


        <?php
        /* Destroy the result set and free the memory used for it 结束查询释放内存 */
        $result->free();
        }
        /* Close the connection 关闭连接*/
        $conn->close();
        ?>

</article>
<?php

if(isset($_SESSION['username'])){
//                echo '欢迎  '.$_SESSION['username'];
echo'
<!-- 置顶、购物车按钮 -->
<div class="toTop">
    <a href="#" id="dcar" style="margin-left: 10px;">
    <span style="display: inline-block;
    text-align: center;
    line-height: 30px;
    width: 30px;
    height:30px;
    background-color: #ff0000;
    border-radius: 50%;
    position: absolute;
    left: 7px;
    top:10px;
    font-size: 25px;
    color: white;" id="dprocount"></span>


        <img src="img/gouwuche.png " width="86px " height="86px " alt="购物车 "></a>
    <div class="float-right-t ">
        <div>
            <a href="javascript: " class="totop"><img src="img/gotop1.png " width="56px " height="56px " alt="置顶 "></a>
        </div>
    </div>
</div>
';

}else{

}?>

<diV style="height:200px; "></diV>
<?php include 'foot.php' ?>

</body>
</html>