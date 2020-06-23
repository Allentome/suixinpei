

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>购物车</title>
    <link rel="stylesheet" href="css/reset_1.css">
    <link rel="stylesheet" href="css/carts.css">
    <link rel="icon" href="img/ico6.ico" type="image/x-icon"/>   <!--设置网页小图标-->
    <title>购物车页</title>
</head>
<body style="background-color:white">
<?php

include 'nav_gouwuche.php'
?>
    <section class="cartMain">
        <div class="cartMain_hd">
            <ul class="order_lists cartTop">
                <li class="list_chk">
                    <!--所有商品全选-->
                    <input type="checkbox" id="all" class="whole_check">
                    <label for="all"></label>
                    全选
                </li>
                <li class="list_con">商品信息</li>
                <li class="list_info">商品参数</li>
                <li class="list_price">单价</li>
                <li class="list_amount">数量</li>
                <li class="list_sum">金额</li>
                <li class="list_op">操作</li>
            </ul>
        </div>

        <div class="cartBox">
            <?php

            //连接数据库connection
              include'pass.php';
            //$conn::set_charset('utf8');
            //->必须是实例化后的对象使用； 而::可以是未实例化的类名直接调用
            //向数据库发送sql指令，获得结果集
            $id=$_SESSION["id"];
            $result=$conn->query("SELECT * FROM shoppingcart where id='$id' ");
            if ($result){
            //print("Very large cities are: ");
            /* Fetch the results of the query 返回查询的结果 */
            ?>
            <div class="shop_info">
                <!--<div class="all_check">-->
                    <!--&lt;!&ndash;店铺全选&ndash;&gt;-->
                    <!--<input type="checkbox" id="shop_a" class="shopChoice">-->
                    <!--<label for="shop_a" class="shop"></label>-->
                <!--</div>-->
                <!--<div class="shop_name">-->
                    <!--店铺：<a href="javascript:;">搜猎人艺术生活</a>-->
                <!--</div>-->
            </div>
            <div class="order_content">
                <?php

                while ($row = $result->fetch_assoc()) {
                ?>
                <ul class="order_lists">

                    <form method="post" action="shopping.php" target="_blank">
                        <input type="hidden" class="inventory" value="<?php echo $row['inventory']?>">
                        <li class="list_chk">
                            <input type="checkbox" id="checkbox_<?php echo $row['goodsid']?>" value="<?php echo $row['goodsid']?>" class="son_check">
                            <label for="checkbox_<?php echo $row['goodsid']?>"></label>
                        </li>
                        <li class="list_con">
                            <div class="list_img"><a href="javascript:;"><img src="img_allmain/<?php echo $row['detailedpicture'] ?>.png" alt=""></a></div>
                            <div class="list_text"><a href="javascript:;"><?php echo $row['name'] ?></a></div>
                        </li>
                        <li class="list_info">
                            <p>规格：默认</p>
                            <p class="size"><?php echo $row['size'] ?></p>
                        </li>
                        <li class="list_price">
                            <p class="price"><?php echo $row['price'] ?></p>
                        </li>
                        <li class="list_amount">
                            <div class="amount_box">
                                <a href="javascript:;" class="reduce reSty">-</a>
                                <input type="text" value="<?php echo $row['quantity']?>" class="sum">
                                <a href="javascript:;" class="plus">+</a>
                            </div>
                        </li>
                        <li class="list_sum">
                            <p class="numprice"><span class="sum_price"><?php echo $row['price'] ?></span>￥</p>
                        </li>
                        <li class="list_op">
                            <p class="del"><a href="javascript:;" class="delBtn">移除商品</a></p>
                        </li>

                    </form>

                </ul>
                      <?php
                }
                ?>
            </div>
        </div>


        <!--底部-->
        <div class="bar-wrapper">
            <div class="bar-right">
                <div class="piece">已选商品<strong class="piece_num">0</strong>件</div>
                <div class="totalMoney">共计: <strong class="total_text">0.00￥</strong></div>
                <div class="calBtn"><a href="javascript:;">结算</a></div>
            </div>
        </div>
    </section>
    <section class="model_bg"></section>
    <section class="my_model delete">
        <p class="title">删除商品<span class="closeModel">X</span></p>
        <p>您确认要删除该商品吗？</p>
        <div class="opBtn"><a href="javascript:;" class="dialog-sure dialogsure">确定</a><a href="javascript:;" class="dialog-close">关闭</a></div>
    </section>
    <section class="model_bg"></section>
    <section class="my_model balance">
        <p class="title">结算商品<span class="closeModel">X</span></p>
        <p id="balanceMoney" style="font-size: 20px;font-weight: bold"></p>
        <div class="opBtn"><a href="javascript:;" class="dialog-sure" id="sure">确定</a><a href="javascript:;" class="dialog-close">关闭</a></div>
    </section>
    <script src="js/jquery2013.min.js"></script>
    <script src="js/carts.js"></script>
    <?php
    /* Destroy the result set and free the memory used for it 结束查询释放内存 */
    $result->free();
    }
    /* Close the connection 关闭连接*/
    $conn->close();
    ?>
</body>
</html>