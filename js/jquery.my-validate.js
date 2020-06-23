$.fn.extend({
	btnEnabled:function(){
		this.removeAttr('disabled');
		return this;
	},
	btnDisabled:function(){
		this.prop('disabled','disabled');
		return this;
	},
	validateAll:function(option){
		var passed= true;
		this.find('[data-required="required"]').each(function(){
			passed =$(this).validate(option) && passed;
		});
		return passed;
	},
	validate:function(option){
		var defaults = {
			username:{
				regExp:/^[a-zA-Z][a-zA-z0-9]{5,19}$/,
				errorMes:'请输入6-20个字符',
				output:'userTips'
			},
            name:{
                regExp:/^\S{2,8}$/,
                errorMes:'请输入2-8个字符',
                output:'nameTips'
            },
			password:{
				regExp:/^\S{8,12}$/,
				errorMes:'请输入8-12个字符',
				output:'pwdTips'
			},
            phone:{
                regExp:/^[0-9]{5,11}$/,
                errorMes:'请输入5-11个字符',
                output:'phoneTips'
            },
            address:{
                regExp:/^[a-zA-z0-9]{6,20}$/,
                errorMes:'请输入6-20个字符',
                output:'addTips'
            },
	        warningFontStyle:{
	        	color:'red'
	        },
	        passedFontStyle:{
	       	    color:'blue'
	        },
	        checkPwdStrenth: false
		};
		var params = $.extend(true,{},defaults,option);
		var thisinput =params[this.data('name')];
		var regexp =thisinput.regExp;
		if(regexp.test(this.val())){
			this.removeClass('prompt');
			if(this.data('name')=='password'&&params.checkPwdStrenth){
				$('#'+thisinput.output).css(params.passedFontStyle).text(this.checkPwdStrenth());
			}else{
				$('#'+thisinput.output).empty();
			}
			return true;
		}else{
			$('#'+thisinput.output).css(params.warningFontStyle).text(thisinput.errorMes);
			this.addClass('prompt');
			return false;
		}
	},
	checkPwdStrenth:function(){
		var pwd =this.val();
		var type=0;
        if(!!pwd.match(/\d/)){
            type++;
        }
        if(!!pwd.match(/[a-zA-Z]/)){
            type++;
        }
        if(!!pwd.match(/[-+=|,:'"!@#$%^&*?_.~`+/\\(){}\[\]<>]/)){
            type++;
        }
        switch (type){
            case 1:
                return'弱';
                break
            case 2:
                return'中';
                break
            case 3:
                return'强';
        }
	}
});
