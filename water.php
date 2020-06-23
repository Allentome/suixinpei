<?php
$conn = new mysqli('localhost', 'root', '123456', 'followsuit');
//指定编码集，注意数据库的编码集要一致！
$conn->set_charset('utf8');
$result=$conn->query('SELECT * FROM goods where clotheskind="衣服"  limit 8');
$result1=$conn->query('SELECT * FROM goods where clotheskind="裤子" limit 8');
if ($result&&$result1){

    /* Close the connection 关闭连接*/

    ?>
    <script>
    $(function(){
    $("#div1").waterfall({
    itemClass: ".box",
    minColCount: 2,
    spacingHeight: 10,
    resizeable: true,
    ajaxCallback: function(success, end) {
    var data = {"data": [
    <?php while ($row=mysqli_fetch_assoc($result)){ ?> { "src": "<?php echo $row['mainpicture'] ?>.png" },<?php } ?>


    ]};
    var str = "";
    var templ = '<div class="box"  style="opacity:0;filter:alpha(opacity=0);"><a href=""><img src="i/{{src}}" /></a></div>'

    for(var i = 0; i < data.data.length; i++) {
    str += templ.replace("{{src}}", data.data[i].src);
    }            $(str).appendTo($("#div1"));
    success();
    end();
    }
    });
    });
</script>

    <?php

}
    $result->free();

    $conn->close();
?>