<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InactivelistController extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->model('InactivelistModel','inactivemodel');
        $this->load->helper('text');
        $this->load->helper('form');        
        $this->load->model('InactivelistModel', 'inactive');
        $this->lang->load('warehouse', $this->config->item("language"));
    }
    public function index()
    {
        if(!$this->session->userdata('user')){
            redirect('/');
        }
        if(!isset($keyword))
            $keyword = "all";   
        $data = array(
            "subtitle" => "InactiveList",
            "description" => "Total information about my InactiveList.",
            "contentview" => "inactivelist/list",
            "phonenumberlst" => $this->inactivemodel->getListPhoneNumber(),
            "curphonenumber" => $keyword
         );
        ///Database Register Model
        $this->load->view('layout',$data);
    }
    public function delete()
    {
        $p_id = $this->input->post('del_id');
        $msg = $this->inactivemodel->delete_list($p_id);
        echo json_encode($msg);
    }
    
    public function update()
    {
      $data = array('msg'=>'success');
      echo json_encode($data);
    }
    public function warehouse_getid()
    {
        //$getid['id'] = $this->input->post('id');
        $result=$this->msgmodel->warehouse_getid($this->input->post('id'));
        $data = array('phonenumber'=>$result[0]['phonenumber']);
        echo json_encode($data);
    }
    public function warehouse_edit()
    {
        $result = $this->msgmodel->warehouse_edit($this->input->post('edit_id'),$this->input->post('name'));
        if($result ==  true)
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
