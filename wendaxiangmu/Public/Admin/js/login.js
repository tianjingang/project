$(function(){
	//验证码
	$('#codes').click(function(){
		$(this).prev().attr('src','verify/'+Math.random());
		
	});
	//验证用户名
	$('input[name="username"]').blur(function(){
		if($(this).val()==""){
			$(this).next().remove();
			$(this).after('<span class="error">用户名不能为空</span>');
		}else{
			$(this).next().remove();
		}
	});
	//验证密码
	$('input[name="password"]').blur(function(){
		if($(this).val()==""){
			$(this).next().remove();
			$(this).after('<span class="error">密码不能为空</span>');
		}else{
			$(this).next().remove();
		}
	});
	//检测验证码
	$('input[name="code"]').blur(function(){
		if($(this).val()==""){
			$(this).parent().find('span').remove();
			$(this).after('<span class="error">验证码不能为空</span>');
			//$(this).parent().append('<span class="error">验证码不能为空</span>');
		}else{
			$(this).parent().find('span').remove();
	
		}
	});

	//点击提交验证
	$('.submit').click(function(){
			//触发上面的事件
			//触发验证用户名
			$("input[name='username']").trigger("blur");
			//触发验证密码
			$("input[name='password']").trigger("blur");
			//触发验证码
			$("input[name='code']").trigger("blur");
		//验证验证码
		if($('table.span').length==0){
			//所有验证通过  获取用户名密码 ajax
			var username=$("input[name='username']").val();
			var pwd=$("input[name='password']").val();
			var code=$("input[name='code']").val();
			$.ajax({
				type:'post',
				url:'login_check',
				data:{
					name:username,
					pwd:pwd,
					code:code
				},
				success:function(data){
					if(username!="" && pwd!="" && code!=""){
						if(data==1){
							$("input[name='code']").after('<span class="error">验证码不正确</span>');
							$('#codes').prev().attr('src','verify/'+Math.random());
						}else if(data==2){
							$("input[name='username']").after('<span class="error">用户名不存在</span>');
							$('#codes').prev().attr('src','verify/'+Math.random());
						}else if(data==3){
							$("input[name='password']").after('<span class="error">密码不正确</span>');
							$('#codes').prev().attr('src','verify/'+Math.random());
						}else{
							location.href='/wendaxiangmu/index.php/Admin/Index/index';
						}
						
					}
				}

			});

		}
	});
});