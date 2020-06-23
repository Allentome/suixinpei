$(document).ready(function() {
    $('.proR :checkbox').click(function() {
        if($(this).is(':checked')) {
            $('button').btnEnabled().addClass('btnEnabled');
        } else {
            $('button').btnDisabled().removeClass('btnEnabled');
        }
    });
    var options = {
        username: {
            regExp: /^[a-zA-Z][a-zA-z0-9]{5,7}$/,
            errorMes: '请输入6-8个字母、数字，以字母开头',
            output: 'userTips'
        },
        name: {
            regExp: /^\S{2,8}$/,
            errorMes: '请输入2-8个字符',
            output: 'nameTips'
        },
        password: {
            regExp:/^\S{8,12}$/,
            errorMes:'请输入8-12个字符',
            output:'pwdTips'
        },
        phone:{
            regExp:/^[0-9]{5,11}$/,
            errorMes:'请输入5-11个数字',
            output:'phoneTips'
        },
        address:{
            regExp:/^[a-zA-z0-9]{6,20}$/,
            errorMes:'请输入6-20个字符',
            output:'addTips'
        },
        passedFontStyle: {
            color: 'green'
        },
        checkPwdStrenth: true
    };

    $('button').click(function() {
        var b=$('#login-form').validateAll(options);
        if(b){
            var result=isUsernameAvail($('#username').val(),$('#username').parent().children('.tipsR'));
            result= isNameAvail($('#name').val(),$('#name').parent().children('.tipsR'))&&result;

            return _isUsernameAvail&&_isNameAvail;

        }
        return b;
    });
    var _isUsernameAvail=false;

    $('#username').on('keyup change', function() {
        if($(this).validate(options)){
            isUsernameAvail($(this).val(),$(this).parent().children('.tipsR'));
        }

    });
    var _isNameAvail=false;
    $('#name').on('keyup change', function() {
        if($(this).validate(options)){
            isNameAvail($(this).val(),$(this).parent().children('.tipsR'));
        }
    });
    $('#password').on('keyup change', function() {
        $(this).validate({
            passedFontStyle: {
                color: 'green'
            },
            checkPwdStrenth: true
        });
    });
    $('#phone').on('keyup change', function() {
        $(this).validate(options);
    });
    $('#address').on('keyup change', function() {
        $(this).validate(options);
    });
   function isUsernameAvail($username,$tipsR){
       $.ajax({
           contentType:"application/x-www-form-urlencoded",
           type:"post",
           url:"php/isUsernameAvail.php",
           data:{'username':$username},
           success:function(msg) {
               if(msg=='1'){
                   $tipsR.css('color','red').text('此账号已有人注册，请重新输入');
                   _isUsernameAvail=false;

               }else if(msg=='0'){
                   $tipsR.css('color','green').text('此账号可以使用');
                   _isUsernameAvail=true;
               }

           },
           error:function(){
               $(this).parent().next().text('服务器异常');
           }
       })
   }
    function isNameAvail($name,$tipsR){
        $.ajax({
            contentType:"application/x-www-form-urlencoded",
            type:"post",
            url:"php/isNameAvail.php",
            data:{'name':$name},
            success:function(msg) {
                if(msg=='1'){
                    $tipsR.css('color','red').text('该名字已有人使用，请重新输入');
                    _isNameAvail=false;

                }else if(msg=='0'){
                    $tipsR.css('color','green').text('该名字可以使用');
                    _isNameAvail=true;
                }

            },
            error:function(){
                $(this).parent().next().text('服务器异常');
            }
        })
    }


});