$(function(){
    $("#div1").waterfall({
        itemClass: ".box",
        minColCount: 2,
        spacingHeight: 10,
        resizeable: true,
        ajaxCallback: function(success, end) {
            var data = {"data": [
                    { "src": "" },{ "src": "01.jpg" },{ "src": "01.jpg" }, { "src": "01.jpg" },
                ]};
            var str = "";
            var templ = '<div class="box"  style="opacity:0;filter:alpha(opacity=0);"><img src="img/{{src}}" /><div class="slide" >zsa<div><a name="clothes" class="slide_box" >1222</a></div></div></div>'

            for(var i = 0; i < data.data.length; i++) {
                str += templ.replace("{{src}}", data.data[i].src);
            }            $(str).appendTo($("#div1"));
            success();
            end();
        }
    });
});
