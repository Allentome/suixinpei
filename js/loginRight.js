$(function() {
    $('.pro :checkbox').click(function () {
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
            $password.parent().removeClass('warning').next().text('密码强度：'+checkPwdStrength(pwd));
            return true;
        }else{
            $password.addClass('warning');
            $password.parent().next().text('请输入8-12个字符');
            return false;
        }
    }
    function checkPwdStrength(pwd){
        var type = 0;
        if (!!pwd.match(/\d/)){
            type++;
        }
        if (!!pwd.match(/[a-zA-z]/)){
            type++;
        }
        if(!!pwd.match(/[-+=|,:;'"!@#$%^&*?_·~+/\\(){}\[\]<>]/)){
            type++;
        }
        switch(type){
            case 1:
                return '弱';
                break;
            case 2:
                return '中';
                break;
            case 3:
                return '强';
        }
    }

});