<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){

		$this->display();
	}
	 //验证码
	 public function verify(){	
        ob_clean();
		$Verify =     new \Think\Verify();
		// 设置验证码字符为纯数字
		//$Verify->length   ='4';
		$Verify->fontttf = '5.ttf';  
		$Verify->entry();
	}
	// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
	function check_verify($code, $id = ''){    
		$verify = new \Think\Verify();    
		return $verify->check($code, $id);
	}
	 //登录
	 public function login_check(){
	 //验证码
		if(IS_AJAX){
			$username=I('post.name');
			$pwd=I('post.pwd');
			$code = I('post.code');
			$arr=D('Login')->find("username='$username'");
			//$verify = new \Think\Verify(); 
			if($this->check_verify($code) ){
				if($arr){
					if($arr['password']==$pwd){
						session('user',$username);
						$date=date('Y-m-d H:i:s');
						$ip=get_client_ip();
						//echo $ip; die;	
						$last_time=$arr['login_time'];
						$last_ip=$arr['login_ip'];
						$ar=array(
							'last_time'=>$last_time,
							'login_time'=>$date,
							'last_ip'=>$last_ip,
							'login_ip'=>$ip
							);
						D('Login')->update("username='$username'",$ar);
					}else{
						echo 3;
					}
				}else{
					echo 2;
				}
			}else{
				echo 1;
			}
			
		}
	} 
}