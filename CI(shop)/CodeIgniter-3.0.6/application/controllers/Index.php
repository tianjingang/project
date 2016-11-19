<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index1()
    {
        //echo 1;die;
        $this->load->view('form.html');
    }
    //添加
    public function add()
    {
        $u_name=$_POST['u_name'];
        $u_pwd=$_POST['u_pwd'];
        $res=$this->db->query("insert into user value (null ,'$u_name',' $u_pwd')");
        if($res){
            redirect('Index/show');
        }
        else{
            redirect('Index/index1');
        }
    }
    //展示
    public function show(){
       $arr['list']= $this->db->get('user')->result_array();
        $this->load->view('show.html',$arr);
    }
    //删除
    public function del(){
        $id=$_GET['id'];
       $ar= $this->db->query("delete from user where id = '$id'");
        if($ar){
            redirect('Index/show');
        }else{
            redirect('Index/show');
        }
    }
    // 修改
    public function upd(){
        if($this->input->get()){
            $id = $_GET['id'];
            $re = $this->db->where("id = $id")->get("user")->result_array();
            $arr['arr'] = $re[0];
            $this->load->view("updete.html",$arr);
        }else{
            $id = $_POST['id'];
            $data = $_POST;
            $this->db->where('id', $id);
           $re = $this->db->update('user', $data);
            if($re){
                redirect('Index/show');
            }else{
                redirect('Index/show');
            }
        }
    }
}
