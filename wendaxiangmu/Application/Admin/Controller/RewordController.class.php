<?php
namespace Admin\Controller;
use Think\Controller;
class RewordController extends Controller{
    function reword(){
        $this->display();
    }

    //修改金币规则
    public function upgold()
    {
        //获取路径
        $path = APP_PATH."Common/Conf/reword.php";
        //把值转化一个字符串
        $config = var_export($_POST,true);
        //拼接PHP代码
        $reward = "<?php"."\n"."return ".$config."\n"."?>";
        //把文件写入并判断是否修改成功
        if(file_put_contents($path,$reward))
        {
           $this->error('修改成功');
        }
        else
        {
            $this->error('修改失败');
        }

    }


}