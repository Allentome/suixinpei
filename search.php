

<link rel="stylesheet" href="css/searches.css">
<?php include 'nav.php'?>
<?php //include 'slide.php'?>
<!--    瀑布流-->

<div class="container1">
    <div class="moreloades">
        <ul >
    <?php
    if($_POST){
//                isset是否有，，,trim移除字符串两侧的空白字符
        $songname = isset($_POST['crid']) ? trim($_POST['crid']) : '';
      include'pass.php';
//                很容易误解empty()函数是判断字符串是否为空的函数，其实并不是，我也因此吃了很多亏。empty()函数是用来测试变量是否已经配置
        if(empty($songname)){
            $str= "请输入要查询的衣服";
        }else{
            $rsbooks= $conn->query("select * from goods where name like'%$songname%'");
//                    mysql_fetch_assoc返回的是数组
            $row = $rsbooks->fetch_assoc();
//                    num_rows;判断返回值的大小
            $totalRows_rsbooks = $rsbooks->num_rows;
        }
        ?>

        <?php if($songname) {  if($totalRows_rsbooks){   ?>


            <?php do { ?>


                <li>
                    <form method="get" action="details.php" target="_blank">
                        <!--            --><?php //echo '<a name="goodsid" href="../details/details.php?id=' . $row['goodsid'] . '" target="_blank"> '?>
                        <img src="totalimg/<?php echo $row['detailedpicture'] ?>.png" width="150" height="150" ></a>
                        <div class="div21"style="height: 30px;"> <div  style="color: red;font-size: 20px;float: left;">￥<?php echo $row['price'] ?></div><div><h6 >包邮</h6></div></div>
                        <div class="div21"><?php echo $row['name'] ?></div></a>
                        <div class="div21" style="height: 30px"> <div  style="float: left;color: #3c3c3c;font-size: 10px"><?php echo $row['introduction'] ?></div><div style="float: right;font-size: 10px ;color: #4e4e4e"><?php echo $row['goodsid'] ?>人付款</div></div>
                        <input name="goodsid" type="hidden" value="<?php echo $row['goodsid'] ?>">
                        <input value=" " type="submit" style="cursor:pointer;width: 275px;height: 350px; background-color: white;top: 0;position: absolute;opacity: 0.1">
                    </form>
                </li>






            <?php } while ($row = $rsbooks->fetch_assoc()); ?>
            <!--                    </table>-->
            <?php
            $rsbooks->free();
        }else{
            echo "

<h1 style='font-size: 30px;text-align: center;color: red'>没有搜索到相关衣服</h1>";
        }
        }
        else{
            echo "
<h1 style='font-size: 30px;text-align: center;color: red'>".$str."</h1>";
        }

    }
    $conn->close();

    ?>
    </ul>

            </div>

            </div>