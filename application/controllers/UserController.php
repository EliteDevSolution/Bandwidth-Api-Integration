<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('UserModel','user');
		$this->load->model('WarehouseModel','warehouse');
		$this->load->model('UserAuthorityModel','userAuthority');
		$this->load->model('UserWarehouseModel','userWarehouse');
		$this->lang->load('user', $this->config->item("language"));
	}
	public function index()
	{
    }
	
	public function usermanage()
    {
        $user = $this->user->get_user_list();
		$data = array(
			"subtitle" => "Control de usuario",
			"description" => "Total information about our Users.",
			"contentview" => "admin/usermanage",
			"user" => $user
		);
		$this->load->view('layout', $data);
    }   
    public function user_delete()
    {
        $p_id = $this->input->post('del_id');
        $msg = $this->user->delete_user($p_id);
        echo json_encode($msg);
    }
    
	public function userpermision()
	{
		$userdata= $this->user->user_getid($this->input->get('id'));
		$warehouse = $this->warehouse->get_warehouse_list();
		$warehousecheck = $this->userWarehouse->get_warehouse_checkedlist($this->input->get('id'));
		$userAuthority = $this->userAuthority->get_userAuthority($this->input->get('id'));
		
		$data = array(
			"subtitle" => "Control de usuario",
			"description" => "Total information about our Usermanage.",
			"contentview" => "admin/userpermision",
			"userdata" => $userdata,
			"warehouse" => $warehouse,
			"warehousecheck" => $warehousecheck,
			"userAuthority" => $userAuthority
		);
		$this->load->view('layout',$data);
	}
	
	public function usersearch()
	{
		$user['user'] = $this->user->get_searchlist($this->input->post('search_str'));
		$this->load->view('/admin/table',$user);
	}
	
	public function user_authoritycheck()
	{
		$result = $this->userAuthority->set_userAuthority($this->input->post('id'),$this->input->post('state'),$this->input->post('usernum'),$this->input->post('value'));
		if($result == true)
        {
            $data = array('msg'=>'success');
            echo json_encode($data);
        }
        else {
            $data = array('msg' => 'failed');
            echo json_encode($data);
        }
	}
	public function user_warehousecheck()
	{
		$result = $this->userWarehouse->setWarehouse($this->input->post('id'),$this->input->post('state'),$this->input->post('usernum'));
		if($result == true)
        {
            $data = array('msg'=>'success');
            echo json_encode($data);
        }
        else {
            $data = array('msg' => 'failed');
            echo json_encode($data);
        }
	}
	
}
