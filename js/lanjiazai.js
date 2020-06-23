var _content = []; //临时存储li循环内容
var moreload = {
    _default:10, //默认显示图片个数
    _loading:5,  //每次点击按钮后加载的个数
    init:function(){
        var lis = $(".moreload .hidden li");
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
        $(".moreload .hidden").html("");
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