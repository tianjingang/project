$(function () {
	$( '#sel-cate' ).click( function () {
		dialog($( '#category' ));
	} );
    $('textarea').keyup(function(){
        var content = $(this).val();
        if(content.length > 50){
            $(this).val(content.substr(0,50));
        }else{
            $("#num").html(50-content.length);
        }
    });
    var opt = $( 'select[name=reward] option' );
	for (var i = 0; i < opt.length; i++) {
		if (opt.eq(i).val() > point) {
			opt.eq(i).attr('disabled', 'disabled');
		}
	}
    //获取自己的金币数
    var gold=$('.gold').html();
   var opt= $('select[name="gold"] option');
    for(var i=0;i<opt.length;i++){
        if(opt.eq(i).val()>gold){
            opt.eq(i).attr("disabled","disabled");
        }
    }

/*
//联动
    $(document).on('change','#sel select',function(){
        var pid =$(this).val();
        var select = $(this);
        select.next().remove();
        if($(this).val()!=-1){
            $.ajax({
                type:'post',
                url:'test.php',
                data:{
                    'pid':pid
                },
                dataType:'json',
                success:function(data){
                    if(data!=0){
                        var str="<select>";
                        for(var j=0;j<data.length;j++){
                            str=str+"<option value='"+data[j].id+"'>"+data[j].name+"</option>";

                        }
                        str=str+"</select>"
                        select.after(str);
                    }
                }
            });
        }
    });
*/
//四级联动
    $(document).on('change','#cate select',function () {
        var pid = $(this).val();
        //alert(pid);
        var select = $(this);
        select.nextAll().remove();
        if($(this).val()!=-1){
            $.ajax({
                type:'post',
                url:getCate,
                data:{
                    'p_id':pid
                },
                dataType:'json',
                success: function (data) {
                    if(data!=0){
                        var str='<select><option value="-1">请选择..</option>';
                        for(var j=0;j<data.length;j++){
                            str = str+"<option value='"+data[j].id+"'>"+data[j].c_name+"</option>"
                        }
                        str = str+"</select>";
                        select.after(str);
                    }
                }
            })
        }
    })


	/*//选择分类
	var cateID = 0;
	$( 'select[name=cate-one]' ).change( function () {
		var obj = $( this );

		if (obj.index() < 3) {
			var pid = obj.val();
			$.getJSON(getCate, {pid : pid}, function (data) {
				if (data) {
					var option = '';
					$.each(data, function (i, k) {
						option += '<option value="' + k.id + '">' + k.name + '</option>';
					});
					obj.next().html(option).show();
				}
			}, 'json');
		}

		cateID = obj.val();
	} );

	$( '#ok' ).click( function () {
		if (!cateID) {
			alert('请选择一个分类');
			return;
		}
		$( 'input[name=cid]' ).val(cateID);
		$( '.close-window' ).click();
	} );

	$( '.send-btn' ).click( function () {
		var cons = $( 'textarea[name=content]' );
		if (cons.val() == '') {
			alert('请输入提问内容');
			cons.focus();
			return false;
		}

		if (!cateID) {
			alert('请选择一个分类');
			return false;
		}

		if (!on) {
			$( '.login' ).click();
			return false;
		}
	} );*/

});


/**
 * 统计字数
 * @param  字符串
 * @return 数组[当前字数, 最大字数]
 */
function check (str) {
	var num = [0, 50];
	for (var i=0; i<str.length; i++) {
		//字符串不是中文时
		if (str.charCodeAt(i) >= 0 && str.charCodeAt(i) <= 255){
			num[0] = num[0] + 0.5;//当前字数增加0.5个
			num[1] = num[1] + 0.5;//最大输入字数增加0.5个
		} else {//字符串是中文时
			num[0]++;//当前字数增加1个
		}
	}
	return num;
}