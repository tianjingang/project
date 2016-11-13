<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends MY_Controller {
	/*
		*@Name Wyf.
		*@Date 2016/5/19.
		*@地区控制器
	 */
	public function arealist()
	{
		//根据级别和id查询
		$level=array('一级','二级','三级','四级','五级','六级','七级','八级','九级');
		$map['parent_id']=$this->uri->segment(4)?$this->uri->segment(4):0;
		/*if(empty($child_area))
		{*/
			foreach($level as $key=>$val)
			{
				if(urldecode($this->uri->segment(3))==$val)
				{
					if($key==count($level))
					{
						//提示不能创建下一级，返回
						return ;
					}
					$map['area_type']=$level[$key+1];
				}
			}
		// }
		//得到地区数据
		$data['areas']=$this->db->where($map)->get('a_area')->result_array();
		if(empty($data['areas']))
		{
			//伪造数据
			$data['areas']=array(array('area_name'=>'','area_type'=>$map['area_type'],'parent_id'=>$map['parent_id']));
		}
		$this->load->view("Area/arealist.html",$data);
	}
	/*
	 *地区入库
	 */
	public function area_add()
	{
		$data=$this->input->post();
		//判断数据是否存在，根据地区名，父ID判断
		$map['area_name']=$data['area_name'];
		$map['parent_id']=$data['parent_id'];
		$this->db->where($map)->get('a_area')->row_array();
		if($this->db->affected_rows()>0)
		{
			$msg['status']=0;
			$msg['msg']='地区已存在';
			echo json_encode($msg);
		}
		else
		{
			//添加
			$this->db->insert('a_area',$data);
			$area_id=$this->db->insert_id();
			if($this->db->affected_rows()>0)
			{
				//组装地址
				$msg['href']=site_url('Area/arealist').'/'.$data['area_type'].'/'.$this->db->insert_id();
				$msg['status']=1;
				$msg['area_id']=$area_id;
				echo json_encode($msg);
			}
		}
	}
	/*
	 *删除
	 */
	public function area_del()
	{
		//接收ID
		$area_id=$this->input->post('area_id');
		//判断是否有儿子
		$this->db->get_where('a_area',array('parent_id'=>$area_id))->result_array();
		if($this->db->affected_rows()>0)
		{
			$msg['status']=0;
			$msg['msg']='删除失败，有下属地区';
			echo json_encode($msg);
		}
		else
		{
			$this->db->where('area_id',$area_id)->delete('a_area');
			if($this->db->affected_rows()>0)
			{
				$msg['status']=1;
				echo json_encode($msg);
			}
		}
	}
}
