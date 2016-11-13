<?php
//$_FILES=file_get_contents('http://api.k780.com:88/?app=sms.send&tempid=50752&param=usernm%3Dadmin%26code%3D1234&phone=15227395537&appkey=19643&sign=8fa2ea3922a545788877a59d9895a7a5');

/**
 * @copyright (c) 2015 aircheng.com
 * @file haiyan.php
 * @brief **短信发送接口
 * @author nswe
 * @date 2015/5/30 15:29:38
 * @version 3.3
 */

 /**
  * @class haiyan
  * @brief 短信发送接口 http://www.duanxin10086.com/logins.html
  */
class duanxin extends hsmsBase
{
   // private $submitUrl = "http://www.duanxin10086.com/sms.aspx?action=send";
    private $submitUrl = "http://api.k780.com:88/?app=sms.send&tempid=50766&";


    /**
     * @brief 获取config用户配置
     * @return array
     */
    private function getConfig()
    {
        //如果后台没有设置的话，这里手动配置也可以
        $siteConfigObj = new Config("site_config");

        return array(
            'userid'   => $siteConfigObj->sms_userid,
            'username' => $siteConfigObj->sms_username,
            'userpwd'  => $siteConfigObj->sms_pwd,
        );
    }

    /**
     * @brief 发送短信
     * @param string $mobile
     * @param string $content
     * @return
     */
    public function send($mobile,$content)
    {
        $config = self::getConfig();

        $post_data = array(
            'userid'   => $config['userid'],
            'account'  => $config['username'],
            'password' => $config['userpwd'],
            'content'  => $content,
            'mobile'   => $mobile,
        );


        $string="param=usernm%3Dadmin%26code%3D$content&phone=".$mobile."&appkey=19784&sign=3c088aee11defe44f8ae2faa09e2d888";
        $url    = $this->submitUrl.$string;
        //var_dump($url);die;
        /*$string = '';
        foreach ($post_data as $k => $v)
        {
            $string .="$k=".urlencode($v).'&';
        }

        $post_string = substr($string,0,-1);*/

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL,$url);
       //curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果需要将结果直接返回到变量里，那加上这句。
        $result = curl_exec($ch);
       // print_r($result);die;
        return $this->response($result);
    }

    /**
     * @brief 解析结果
     * @param $result 发送结果
     * @return string success or fail
     */
    public function response($result)
    {
        $arr=json_decode($result,true);
        //print_r($arr);die;
        if($arr['success']==1)
        {
            return 'success';
        }
        else
        {
            return 'fail';
        }
    }
    /**
     * @brief 配置文件
     */
    public function getParam()
    {
        return array(
            "sms_userid"   => "商户ID",
            "sms_username" => "用户名",
            "sms_pwd"      => "密码",
        );
    }
}