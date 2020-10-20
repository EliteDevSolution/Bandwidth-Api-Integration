<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WarehouseController extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->model('WarehouseModel','warehouse');
		$this->lang->load('warehouse', $this->config->item("language"));
	}
	public function index()
	{
    }
	public function regphonenumber()
    {
        if(!$this->session->userdata('user')){
            redirect('/');
        }
        ///Check MessageList
        $this->firstInsert();
        $warehouse = $this->warehouse->get_warehouse_list();
		$data = array(
			"subtitle" => "PhoneNumber Register",
			"description" => "Total information about my PhoneNumber.",
			"contentview" => "admin/regphonenumber",
			"warehouse" => $warehouse
		);
		$this->load->view('layout',$data);
    }
    public function warehouse_delete()
    {
        $p_id = $this->input->post('del_id');
        $msg = $this->warehouse->delete_warehouse($p_id);
        echo json_encode($msg);

    }
    
   public function firstInsert()
   {
        $inactivelst = $this->warehouse->getinactivelst();
        $index = -1;
        $plst = $this->warehouse->getmessagelist();
        $inserlstval = array();
        foreach ($plst as $row) {
            $index++;
            $value = str_replace('+', '', $row['fromnumber']);
            if($row['fromnumber'] == '') continue;
            $iflag = 0;
            foreach ($inactivelst as $curval) {
                if ($value == $curval['phonenumber']) {
                    $iflag = 1;
                    break;
                }
            }
            if($iflag == 1) continue;
            $inserlstval[$index] = $value;
        }
        if (sizeof($inserlstval) != 0) {
           $this->warehouse->multiinsert($inserlstval);
        }
   } 
   public function multiinsert()
   {
        $inactivelst = $this->warehouse->getinactivelst();
        $insertdata = $this->input->post('insertdata');
        $plst = explode("\n", $insertdata);
        $index = -1;
        $inserlstval = array();
        foreach ($plst as $value) {
            $index++;
            $value = preg_replace('/\D/', '', $value);
            $len = strlen($value);
            $iflag = 0;
            foreach ($inactivelst as $curval) {
                if ($value == $curval['phonenumber']) {
                    $iflag = 1;
                    break;
                }
            }
            if($iflag == 1) continue;
            if ($len == 10) {
                $value = "1" . $value;
                $inserlstval[$index] = $value;
            } else if ($len == 11) {
                $inserlstval[$index] = $value;
            } else {
                continue;
            }
        }
        if (sizeof($inserlstval) != 0) {
           $this->warehouse->multiinsert($inserlstval);
        }
         $data = array('msg' => 'success');
         echo json_encode($data);
   } 

    public function delete_all()
    {
        $deleteall = $this->input->post('deleteall');
        if($deleteall != "")
        {
            $msg = $this->warehouse->delete_all();
            echo json_encode($msg);
        }
    }

    public function warehouse_add()
    {
        $new_warehouse['phonenumber'] = $this->input->post('name');
        $new_warehouse['datetime'] = date("Y-m-d h:i:s");
        $result=$this->warehouse->warehouse_add($new_warehouse);
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
        $result=$this->warehouse->warehouse_getid($this->input->post('id'));
        $data = array('phonenumber'=>$result[0]['phonenumber']);
        echo json_encode($data);
    }
    public function warehouse_edit()
    {
        $result = $this->warehouse->warehouse_edit($this->input->post('edit_id'),$this->input->post('name'));
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
