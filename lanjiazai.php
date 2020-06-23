
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">



<link rel="stylesheet" href="css/lanjiazai.css">

<script type="text/javascript" src="../shixun11/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../shixun11/js/lanjiazai.js"></script>
<!--代码部分begin-->

<body>
<?php //include 'shouye.php'?>

<div class="container1 water clearfix">
    <div class="water-line"></div>
    <div class="water-title">每天十点准时更新</div>
    <div class="water-line"></div>

</div>
<!--代码部分begin-->
<div class="container1">
<div class="moreload">
    <div class="hidden3">


<?php
session_start();
include 'pass.php';
$result=$conn->query('SELECT * FROM goods');
if ($result){ ?>
    <?php while ($row=$result->fetch_assoc()) { ?>
        <li>
            <form method="get" action="details.php" target="_blank">
                <!--            --><?php //echo '<a name="goodsid" href="../details/details.php?id=' . $row['goodsid'] . '" target="_blank"> '?>
                <img src="totalimg/<?php echo $row['detailedpicture'] ?>.png" width="150" height="150" ></a>
                <div class="div11"style="height: 30px;"> <div  style="color: red;font-size: 20px;float: left;">￥<?php echo $row['price'] ?></div><div><h6 >包邮</h6></div></div>
                <div class="div11"><?php echo $row['name'] ?></div></a>
                <div class="div11" style="height: 30px"> <div  style="float: left;color: #3c3c3c;font-size: 10px"><?php echo $row['introduction'] ?></div><div style="float: right;font-size: 10px ;color: #4e4e4e"><?php echo $row['goodsid'] ?>人付款</div></div>
                <input name="goodsid" type="hidden" value="<?php echo $row['goodsid'] ?>">
                <input value=" " type="submit" style="cursor:pointer;width: 275px;height: 350px; background-color: white;top: 0;position: absolute;opacity: 0.1">
            </form>
        </li>
        <?php
    }?>

        <?php
}
$result->free();

$conn->close();
?>





    </div>
    <ul class="list">数据加载中，请稍后...</ul>
    <div class="more"><a href="javascript:;" onClick="moreload.loadMore();">加载更多</a></div>
</div></div>
<script src="js/jquery.min.js"></script>
<script>
    var _content = []; //临时存储li循环内容
    var moreload = {
        _default:9, //默认显示图片个数
        _loading:6,  //每次点击按钮后加载的个数
        init:function(){
            var lis = $(".moreload .hidden3 li");
            $(".moreload ul.list").html("");
            for(var n=0;n<moreload._default;n++){
                lis.eq(n).appendTo(".moreload ul.list");
            }
            $(".moreload ul.list img").each(function(){
                $(this).attr('src',$(this).attr('realSrc'));
            })
            for(var i=moreload._default;i<lis.length;i++){
                _content.push(lis.eq(i));
            }
            $(".moreload .hidden3").html("");
        },
        loadMore:function(){
            var mLis = $(".moreload ul.list li").length;
            for(var i =0;i<moreload._loading;i++){
                var target = _content.shift();
                if(!target){
                    $('.moreload .more').html("<p>全部加载完毕...</p>");
                    break;
                }
                $(".moreload ul.list").append(target);
                $(".moreload ul.list img").eq(mLis+i).each(function(){
                    $(this).attr('src',$(this).attr('realSrc'));
                });
            }
        }
    }
    moreload.init();
</script>



</body>

