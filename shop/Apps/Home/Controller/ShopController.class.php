<?php
namespace Home\Controller;
use Think\Controller;
class ShopController extends CommonController
{
    //验证session
    public function  login_session()
    {
        //var_dump($_POST);die;
        $u_name = session('u_name');
        if (!empty($u_name)) {
            $id = $_POST['g_id'];
            $arr = M('ecs_good')->where("g_id='$id'")->find();
           //var_dump($arr);die;
            $crr = M('ecs_shop')->where(array('u_name'=>$u_name
            ) )->find();
            $brr = M('ecs_shop')->where(array('g_sn'=>$arr['g_sn'],'u_name'=>$u_name
        ) )->find();
            //echo  M('ecs_shop')->_sql();die;
            if($crr){
                if (!$brr ) {
                    $data = array(
                        "g_name" => $arr['g_name'],
                        "g_sn" => $arr['g_sn'],
                        "c_id" => $arr['c_id'],
                        "b_id" => $arr['b_id'],
                        "shop_price" => $arr['shop_price'],
                        "market_price" => $arr['market_price'],
                        "goods_img" => $arr['goods_img'],
                        "goods_number" => $arr['goods_number'],
                        "warn_number" => $arr['warn_number'],
                        "is_best" => $arr['is_best'],
                        "is_new" => $arr['is_new'],
                        "is_hot" => $arr['is_hot'],
                        "is_on_sale" => $arr['is_on_sale'],
                        "keywords" => $arr['keywords'],
                        "goods_brief" => $arr['goods_brief'],
                        "g_statue" => $arr['g_statue'],
                        "u_name" => $u_name
                    );
                    $mrr= M('ecs_shop')->add($data);
                    if($mrr){
                        $this->success('加入购物车成功',U('Flow/flow'));
                    }
                    else{
                        $this->error('加入购物车失败');
                    }
                }else{
                    $good_sums=I('post.good_sums');
                    //echo $good_sums;die;
                    M('ecs_shop')->where(array('g_sn'=>$arr['g_sn']
                    ))->save(array('goods_number'=>$good_sums));
                    //echo  M('ecs_shop')->_sql();die;
                    //echo 3;die;
                    $this->success('数量添加成功',U('Flow/flow'));
                    // $this->error('该用户购物车中商品号已存在');
                }
            }else{
                $data = array(
                    "g_name" => $arr['g_name'],
                    "g_sn" => $arr['g_sn'],
                    "c_id" => $arr['c_id'],
                    "b_id" => $arr['b_id'],
                    "shop_price" => $arr['shop_price'],
                    "market_price" => $arr['market_price'],
                    "goods_img" => $arr['goods_img'],
                    "goods_number" => $arr['goods_number'],
                    "warn_number" => $arr['warn_number'],
                    "is_best" => $arr['is_best'],
                    "is_new" => $arr['is_new'],
                    "is_hot" => $arr['is_hot'],
                    "is_on_sale" => $arr['is_on_sale'],
                    "keywords" => $arr['keywords'],
                    "goods_brief" => $arr['goods_brief'],
                    "g_statue" => $arr['g_statue'],
                    "u_name" => $u_name
                );
                $res= M('ecs_shop')->add($data);
                if($res){
                    $this->success('加入购物车成功',U('Flow/flow'));
                }
                else{
                    $this->error('加入购物车失败');
                }
            }

        }
        else {
            $this->error('请先登录,再加入购物车!');
        }
    }
}