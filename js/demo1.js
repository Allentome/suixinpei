/*
	思路：
		要实现的效果：点击“加入购物车”，对应的图片就会飞入购物车，购物车上的数+1
			但是如果图片飞过去了这就没图片了，所以考虑使用克隆方法，
			克隆的样式有：width、height、left、top，并设置在页面的最上边，否则飞的时候看不见
			克隆到body上的购物车位置（飞入效果）：width、height、left、top,  购物车+1
			清除购物车的克隆样式
*/
var iCount = 0; //购物车的变量，用来增加购物车的数量的临时变量
$(document).ready(function(){
    $.ajax({
        contentType:"application/x-www-form-urlencoded",
        type:"post",
        url:"php/myshoppingcartnum.php",
        data:{'id':'1'},
        success: function(result){
            $("#dprocount").text(result);
            iCount=result;
        },
        error:function(){
            $(this).parent().next().text('服务器异常');
        }
    })
	$(".btn").click(function(){
        var $goodsid=$("input[name=goodsid]").val();
        var $size=$("select[name=size]").val();
        $.ajax({
            contentType:"application/x-www-form-urlencoded",
            type:"post",
            url:"php/addshopping.php",
            data:{'goodsid':$goodsid,'size':$size},
            success: function(msg){
                if(msg=='1'){
                    alert('你已经将该商品加入购物车了');
                }else if(msg=='0'){
                    iCount++;
                    var addImg =$("#showbox").find("img");  //找到该商品的图片
                    var cloneImg = addImg.clone();  //对该图片进行克隆
                    cloneImg.css({        //克隆的样式
                        "width": "250px",
                        "height": "250px",
                        "position":"absolute",        //绝对定位
                        "left":addImg.offset().left,  //该图片的left位置
                        "top":addImg.offset().top,    //该图片的top位置
                        "z-index":"200",              //层级，越大越在上
                        "opacity":"0.5"			  //透明度  半透明
                    });

                    //克隆到body上的购物车位置
                    cloneImg.appendTo($("body")).animate({
                        "width":"50px",  //克隆后的宽
                        "height":"50px",  //克隆后的宽
                        "left":$("#dcar").offset().left,  //克隆后的left位置  购物车
                        "top": $("#dcar").offset().top-50   //克隆后的left位置  购物车
                    },1000,function(){      //克隆后
                        $("#dprocount").html(iCount);	//购物车上的数 +1
                        $(this).remove(); //清空购物车  不清除图片会叠加
                    });
                    setTimeout(function(){ alert("加入购物车成功"); }, 1200);
                    //alert('加入购物车成功');
                }
            },
            error:function(){
                $(this).parent().next().text('服务器异常');
            }
        })//点击“加入购物车”触发时事件

	});
});