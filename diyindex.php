<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/allen_pei.css">
    <link rel="stylesheet" href="css/allen1.css">

    <link rel="stylesheet" href="css/common.css">

    <link rel="stylesheet" href="css/slide.css">
    <!--    <link rel="stylesheet" href="css/waterFall.css">-->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/head.js"></script>
    <script type="text/javascript" src="js/slide.js"></script>
    <script type="text/javascript" src="js/jquery.waterfall.js"></script>
    <script type="text/javascript" src="js/waterFall.js"></script>
    <script type="text/javascript" src="js/ziding.js"></script>
    <script type="text/javascript" src="js/demo.js"></script>
    <title>随心配diy</title>
    <link rel="icon" href="img/ico6.ico" type="image/x-icon" />
    <!--设置网页小图标-->

</head>

<body>


    <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: http://www.jssor.com -->
    <!-- This code works with jquery library. -->
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/jssor.slider-21.1.6.mini.js" type="text/javascript"></script>
    <script src="js/diyct.js" type="text/javascript"></script>


    <div class="header">
        <div class="container1 clearfix">
            <img class="logo-img" src="img/logo16.png">



            <span class="h-registers"><a href="login.html" class="h-register">登录</a></span>
            <span class="h-registers"><a href="register.php" class="h-register">注册</a></span>

            <div class="search bar7">
                <form class="clearfix" method="post" action="search.php">
                    <input type="text" placeholder="请搜索衣服" name="crid" id="crid">
                    <button value="搜索" type="submit"></button>
                </form>
            </div>

        </div>
    </div>
    <!--导航-->
    <div class="h-nav-bg">
        <div class="container1">

            <nav class="h-nav ">
                <ul class="clearfix">
                    <li class="h-nav-a-bg">
                        <a href="suixinpei.php" class="h-nav-a ">首页</a>
                    </li>
                    <li class="h-nav-a-bg">
                        <a href="diyindex.php" class="h-nav-a ">推荐</a>
                    </li>
                    <li class="h-nav-a-bg">
                        <a href="#" class="h-nav-a ">男装</a>
                        <div class="h-dropdown">
                            <div><a class="h-dropdown-a" href="#clothes">上衣</a></div>
                            <div><a class="h-dropdown-a" href="#">裤子</a></div>
                            <div><a class="h-dropdown-a" href="#">夏装</a></div>
                        </div>
                    </li>
                    <li class="h-nav-a-bg"><a href="#" class="h-nav-a">女装</a>
                        <div class="h-dropdown">
                            <div><a class="h-dropdown-a" href="#">上衣</a></div>
                            <div><a class="h-dropdown-a" href="#">裤子</a></div>
                            <div><a class="h-dropdown-a" href="#">夏装</a></div>
                        </div>
                    </li>
                    <li class="h-nav-a-bg">
                        <a href="gouwuche.php" class="h-nav-a ">购物车</a>
                    </li>
                    <li class="h-nav-a-bg">
                        <a href="#" class="h-nav-a ">Diy搭配</a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
    <!-- 上衣大盒子 -->
    <!-- <div style="min-width:1310px;margin:0 auto"> -->
    <div class="container1">

        <div id="jssor_1" style="border-top-left-radius:25px;border-top-right-radius:25px;position: relative; margin: 0 auto; top: 20px; left: 0px; width: 960px; min-width: 960px;height: 350px; overflow: hidden; visibility: hidden;
		 background-color: #aaaaaa;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div
                    style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;">
                </div>
                <div
                    style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;">
                </div>
            </div>

            <?php
            include_once 'lib/BmobObject.class.php';
            include_once 'lib/BmobUser.class.php';
            
            // echo $content;
            try {
                /*
                            *  BmobObject 的例子
                            * 连接bmob云数据库
                            */
                $bmobObj = new BmobObject("goods");
                $res = $bmobObj->get();
            
                $array = json_decode(json_encode($res), True);
            } catch (Exception $bmobObj) {
                echo $bmobObj;
            }
            ?>

            <!-- 上衣图片盒子 -->
            <div data-u="slides"
                style="cursor: default; position: relative; top: 0px; left: 290px; width: 600px; height: 350px; overflow: hidden;">

                <?php
                foreach ($array['results'] as $row) {
                ?>
                <div data-p="150.00">

                    <input name="goodsid" type="hidden" value="<?php print_r($row['goodsid']); ?>">
                    <img data-u="thumb" src="img_yifumain/01.png" />
                    <img class="z-index" data-u="image" src="img_yifu/01.png" />
                    <p class=" pice1" style="float:left">aaa</p>
                    <p class="gouwuche pice">￥<?php print_r($row['price']); ?></p>
                    <div class="size">尺寸选择
                        <select name="size">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                        </select>
                    </div>
                    <a style=" text-decoration:none;display: inline-block;position: absolute;right: 0;bottom: 0"
                        href="login.html">
                        <img class="gouwuche" height="62px" width="70px" src="img/购物车2.png">
                    </a>

                </div>

                <?php
                } ?>

                <a data-u="any" href="#" style="display:none">Image Gallery with Vertical Thumbnail</a>
            </div>
            <!-- Thumbnail Navigator -->
            <div data-u="thumbnavigator" class="jssort01-99-66"
                style="position:absolute;left:0px;top:0px;width:240px;height:350px;" data-autocenter="2">
                <!-- Thumbnail Item Skin Begin -->
                <div data-u="slides" style="cursor: default;">
                    <div data-u="prototype" class="p">
                        <div class="w">
                            <div data-u="thumbnailtemplate" class="t"></div>
                        </div>
                        <div class="c"></div>
                    </div>
                </div>
                <!-- Thumbnail Item Skin End -->
            </div>
            <!-- Arrow Navigator -->
            <span data-u="arrowleft" class="jssora05l" style="top:0px;left:248px;width:40px;height:40px;"
                data-autocenter="2"></span>
            <span data-u="arrowright" class="jssora05r" style="top:0px;right:28px;width:40px;height:40px;"
                data-autocenter="2"></span>
        </div>
        <!-- #endregion Jssor Slider End -->


        <?php include 'diyct1.php' ?>



        <!-- 裤子大盒子 -->
        <div id="jssor_2" style="border-bottom-left-radius:25px;border-bottom-right-radius:25px;position: relative; margin: 0 auto; top: 20px; left: 0px; width: 960px; height: 390px; overflow: hidden; visibility: hidden;
          background-color:  #aaaaaa;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div
                    style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;">
                </div>
                <div
                    style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;">
                </div>
            </div>
            <!-- 裤子图片盒子 -->
            <div data-u="slides"
                style="cursor: default; position: relative; top: 0px; left: 290px; width: 600px; height: 390px; overflow: hidden;">

                <?php
                foreach ($array['results'] as $row) {
                ?>
                <div data-p="150.00">

                    <input name="goodsid" type="hidden" value="<?php print_r($row['goodsid']); ?>">
                    <img data-u="thumb" src="img_yifumain/01.png" />
                    <img class="z-index" data-u="image" src="img_yifu/01.png" />
                    <p class=" pice1" style="float:left">aaa</p>
                    <p class="gouwuche pice">￥<?php print_r($row['price']); ?></p>
                    <div class="size">尺寸选择
                        <select name="size">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                        </select>
                    </div>
                    <a style=" text-decoration:none;display: inline-block;position: absolute;right: 0;bottom: 0"
                        href="login.html">
                        <img class="gouwuche" height="62px" width="70px" src="img/购物车2.png">
                    </a>

                </div>

                <?php
                } ?>
                <a data-u="any" href="#" style="display:none">Image Gallery with Vertical Thumbnail</a>
            </div>
            <!-- Thumbnail Navigator -->
            <div data-u="thumbnavigator" class="jssort01-99-661"
                style="position:absolute;left:0px;top:0px;width:240px;height:350px;" data-autocenter="2">
                <!-- Thumbnail Item Skin Begin -->
                <div data-u="slides" style="cursor: default;">
                    <div data-u="prototype" class="p">
                        <div class="w">
                            <div data-u="thumbnailtemplate" class="t"></div>
                        </div>
                        <div class="c"></div>
                    </div>
                </div>
                <!-- Thumbnail Item Skin End -->
            </div>
            <!-- Arrow Navigator -->
            <span data-u="arrowleft" class="jssora05l" style="top:0px;left:248px;width:40px;height:40px;"
                data-autocenter="2"></span>
            <span data-u="arrowright" class="jssora05r" style="top:0px;right:28px;width:40px;height:40px;"
                data-autocenter="2"></span>
        </div>
    </div>



    <!-- 置顶、购物车按钮 -->
    <div class="toTop">
        <a href="#" id="dcar" style="margin-left: 10px;">
            <!-- <span style="display: inline-block;
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
    color: white;" id="dprocount"></span> -->


            <img src="img/gouwuche.png " width="86px " height="86px " alt="购物车 "></a>
        <div class="float-right-t ">
            <div>
                <a href="javascript: " class="totop"><img src="img/gotop1.png " width="56px " height="56px "
                        alt="置顶 "></a>
            </div>
        </div>
    </div>


    <diV style="height:200px; "></diV>

    <link rel="stylesheet" href="./css/footer.css">
    <footer class="fontF ">
        <div class="container1 footer">
            <div id="footer1">
                <div class="footer-top ">关于我们</div>
                <div>平台介绍</div>
                <div>合作伙伴</div>
                <div>公司简介</div>
                <div>联系我们</div>
            </div>
            <div id="footer2" class="foot-line">
                <div class="footer-top">帮助中心</div>
                <div>新手指南</div>
                <div>常见问题</div>
                <div>安全保障</div>
                <div>收费标准</div>
            </div>
            <div id="footer3">
                <div class="footer-top">关注我们</div>
                <div><a href=" " title="浮出文字" id="iconF"></a></div>
                <div><a href="javascript:void(0)" title="浮出文字" id="iconS"></a></div>
            </div>
            <div id="footer4">
                <div>客服热线（工作时间08:00-20:00）</div>
                <div class="bigNum">400-**-****</div>
                <div>dffdbhhs@xxxx.com</div>
                <div>dfjjur ewcgfh ioh rvggeifv all city colloge uhio</div>
                <div>xxxxx栋xxxx号</div>
            </div>
        </div>
    </footer>
</body>

</html>
