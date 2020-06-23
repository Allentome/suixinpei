$(document).ready ( function () {
    //轮播器初始化
    var $img_list = $('.img_list');
    var $current_img = $img_list.first();
    $current_img.addClass('visible');  //为指定集合的每个元素添加类

    var $num_list = $('.num_list');
    var $current_num = $num_list.first();  //.first()过滤函数  获取指定集合中的第一个元素
    $current_num.addClass('opaque');

    //设置自动播放定时器
    var timer =  setInterval(next,2000);
    function next(){
        var index = $current_num.index();
        index = (++index) % 4;
        changeImg($num_list.eq(index));
    }
    function changeImg($this) {
        $current_num.toggleClass('opaque');
        $this.toggleClass('opaque');
        $current_num = $this;
        $current_img.toggleClass('visible');
        $current_img = $img_list.eq($current_num.index());  //过滤函数 .eq(index)获取指定元素集合中指定索引的元素
        $current_img.toggleClass('visible');  //为指定集合中每个元素添加或删除类
    }

    //事件委派
    $('#num').on('mouseover','.num_list',function () {
        changeImg($(this));
        //清定时器
        clearInterval(timer);
    }).on('mouseleave','.num_list',function () {
        timer = setInterval(next,2000);
    });

//登录页面右边的表单
    $('.proL :checkbox').click(function () {
        if ($(this).is(':checked')){
            $('button').removeAttr('disabled').addClass('btnEnabled');
        }else{
            $('button').prop('disabled','disabled').removeClass('btnEnabled');
        }
    });

    $('button').click(function(){
        var result = isUsernameOk();
        result = isPwdOk() && result;
        return result;
    });
    $('#username').on('keyup change',isUsernameOk);
    function isUsernameOk(){
        var reg = /^[a-zA-Z][a-zA-Z0-9]{5,7}$/;
        var $username = $('#username');
        if(reg.test($username.val())){
            $username.removeClass('warning');
            $username.parent().next().text('');
            return true;
        }else{
            $username.addClass('warning');
            $username.parent().next().text('请输入6-8个字母，数字，以字母开头');
            return false;
        }
    }
    $('#password').on('keyup change',isPwdOk);
    function isPwdOk(){
        var reg = /^\S{8,12}$/;
        var $password = $('#password');
        var pwd = $password.val();
        if(reg.test(pwd)){
            $password.removeClass('warning');
            $password.parent().next().text('');
            return true;
        }else{
            $password.addClass('warning');
            $password.parent().next().text('请输入8-12个字符');
            return false;
        }
    }

});