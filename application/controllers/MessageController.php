<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MessageController extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->model('MessageModel','msgmodel');
        $this->load->helper('text');
        $this->load->helper('form');        
        $this->lang->load('warehouse', $this->config->item("language"));
        $this->load->model('InactivelistModel', 'inactive');
    }
    public function index()
    {
        if(!$this->session->userdata('user')){
            redirect('/');
        }
        
        //$this->load->library("Bandwidth");
        //$msgdata = $this->session->userdata('msglist');
        $curphonenumber = $this->input->get('phonenumber_select');
        if(!isset($curphonenumber))
            $curphonenumber = "all";   
        $msglst = $this->msgmodel->get_msg_list($curphonenumber);
        $data = array(
            "subtitle" => "MessageList",
            "description" => "Total information about my MessageList.",
            "contentview" => "messagelist/list",
            "msglst" => $msglst,
            "phonenumberlst" => $this->msgmodel->getListPhoneNumber(),
            "curphonenumber" => $curphonenumber
         );
        ///Database Register Model
        //$this->msgmodel->registerMsgList(explode("||||", $msgdata));
        $this->load->view('layout',$data);
    }
    public function warehouse_delete()
    {
        $p_id = $this->input->post('del_id');
        $msg = $this->msgmodel->delete_warehouse($p_id);
        echo json_encode($msg);

    }
    
    public function warehouse_add()
    {
        $new_warehouse['phonenumber'] = $this->input->post('name');
        $result=$this->msgmodel->warehouse_add($new_warehouse);
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
