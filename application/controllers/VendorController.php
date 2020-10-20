
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class VendorController extends CI_Controller {
    
    var $sendphonenumber;
    var $msgcontent;
    
    function __construct(){
        parent::__construct();
        // Your own constructor code
        $this->load->model('VendorModel', 'vendor');
        $this->load->model('MessageModel', 'msgmodel');
        $this->sendphonenumber = "";
        $this->msgconente = "";
    }
    public function index() {
        if(!$this->session->userdata('user')){
            redirect('/');
        }
        $page_no = isset($_GET['per_page']) ? $_GET['per_page'] : 1;
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
       // print_r($keyword);
        
        $per_page = 10;
        $offset = ($page_no - 1) * $per_page;
        $myphonenumber = $this->vendor->get_my_phonenumber();
        $result['page'] = $page_no;
        $result['per_page'] = $per_page;
        $total = $this->vendor->get_count_list();
     	$data = array(
            "subtitle" => "SendMessage",
            "description" => "Total information about send Messages.",
            "contentview" => "vendor/vendor",
            'total' => $total[0]->count,
            'page' => $page_no,
            'per_page' => $per_page,
            "fromphonenumberlst" => $this->vendor->get_all_phonenumberlist($offset, $per_page),
            "myphonenumber" => $myphonenumber[0]['phone'],
            "phonenumberlst" => $this->msgmodel->getListPhoneNumber()
        );

		
		$this->load->view('layout', $data);
    }

    public function send_message()
    {
        $this->load->library('Sendmessagelib');
        $phonelst = $this->vendor->get_phone_list();
        $msgcontent = $this->input->get('msgcontent');
        if(sizeof($phonelst) != 0)
        {
            $myphonenumber = $this->session->userdata('myphonenumber');
            $this->vendor->savemessage($myphonenumber, $phonelst, $msgcontent);
            $this->sendmessagelib->sendBandWidth_Meesage($myphonenumber, $phonelst, $msgcontent);
            echo "okokok";exit;
        } else 
        {
            echo "error";exit;
        }    
    }

    public function testmsg_send()
    {
        $this->load->library('Sendmessagelib');
        $testnumber = $this->input->get('testnumber');
        $testmsgcontent = $this->input->get('msgcontent');
        $myphonenumber = $this->session->userdata('myphonenumber');
        $this->sendmessagelib->sendBandWidth_TestMsg($myphonenumber, $testnumber, $testmsgcontent);
        //$this->sendmessagelib->sendBandWidth_TestMsg($testnumber, $myphonenumber, $testmsgcontent);
        echo "okokok";exit;
    }
    public function vendor_attach() {
        $footer_data = array(
            'js' => array(
                'public/vender/vender_register.js',
            ),
        );
        $this->load->view('include/admin_header');
        $this->load->view('vendor/vendor_register');
        $this->load->view('include/admin_footer', $footer_data);
    }

    public function register() {

        $state = 0;
        if($this->input->post('state')){
            $state = 1;
        }
        $data = array(
            'name' => $this->input->post('name'),
            'street' => $this->input->post('street'),
            'extStreetNumber' => $this->input->post('extStreetNumber'),
            'inStreetNumber' => $this->input->post('inStreetNumber'),
            'complementaryInfo' => $this->input->post('comp_info'),
            'city' => $this->input->post('city'),
            'state' => $state,
            'zipcode' => $this->input->post('zip_code'),
            'country' => $this->input->post('country'),
            'phoneNumber' => $this->input->post('phone_number'),
            'mail' => $this->input->post('mail'),
        );
        $this->db->insert('vendor', $data);

        echo 'ok';
    }
    //required|min_length[8]|max_length[16]'
	var $form_config = array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required'
		),
		array(
			'field' => 'street',
			'label' => 'street',
			'rules' => 'required',
		),
		array(
			'field' => 'extStreetNumber',
			'label' => 'ExternalStreetNumber',
			'rules' => 'required',
		),
		array(
			'field' => 'inStreetNumber',
			'label' => 'InnerStreetNumber',
			'rules' => 'required',
		),
		array(
			'field' => 'city',
			'label' => 'city',
			'rules' => 'required',
		),
	);

	public function add_vendor() {

		$this->form_validation->set_rules($this->form_config);
		$state = 0;
		if ($this->form_validation->run() != FALSE) {
            //var_dump($_POST); exit;
		    if($this->input->post('state') == 'on'){
		        $state = 1;
            }
			$new_vendor['name'] = $this->input->post('name');
			$new_vendor['street'] = $this->input->post('street');
			$new_vendor['extStreetNumber'] = $this->input->post('extStreetNumber');
			$new_vendor['inStreetNumber'] = $this->input->post('inStreetNumber');
			$new_vendor['complementaryInfo'] = $this->input->post('complementaryInfo');
			$new_vendor['city'] = $this->input->post('city');
            $new_vendor['state'] = $state;
			$new_vendor['zipcode'] = $this->input->post('zipcode');
			$new_vendor['country'] = $this->input->post('country');
			$new_vendor['phoneNumber'] = $this->input->post('phonenumber');
			$new_vendor['mail'] = $this->input->post('mail');
			$msg = $this->vendor->vendor_add($new_vendor);
            $vendor = $this->vendor->get_list();
			$html = '';
			if ($msg) {
			    $i = 0;
			    foreach($vendor as $v) {
			        if($v['state'] == 1){
			            $s = 'accept';
                    }
			        else {
			            $s = 'close';
                    }
			        $i++;
                    $html .="<tr id='tr_".$v['vid']."'>";
                    $html .="<td>".$i."</td>";
                    $html .= "<td>".$v['name']."</td>";
                    $html .= "<td>".$v['street']."</td>";
                    $html .= "<td>".$v['extStreetNumber']."</td>";
                    $html .= "<td>".$v['inStreetNumber']."</td>";
                    $html .= "<td>".$v['complementaryInfo']."</td>";
                    $html .= "<td>".$v['city']."</td>";
                    $html .= "<td>".$v['zipcode']."</td>";
                    $html .= "<td>".$v['country']."</td>";
                    $html .= "<td>".$v['phoneNumber']."</td>";
                    $html .= "<td>".$v['mail']."</td>";
                    $html .= "<td>".$s."</td>";
                    $html .= "<td><a href='javascript:edit_vendor_model(".$v['vid'].")'>Edit</a></td>";
                    $html .= "<td><a href='javascript:confirm_delete(".$v['vid'].")'>Delete</a></td>";
                    $html .= '</tr>';
                }
			}
			echo $html;
		}
	}
	public function edit_vendor() {
	    //var_dump($_POST);exit;
		$this->form_validation->set_rules($this->form_config);
		if ($this->form_validation->run() != FALSE) {
			$vid = $this->input->post('vid');
			$vendor['name'] = $this->input->post('name');
            $vendor['street'] = $this->input->post('street');
            $vendor['extStreetNumber'] = $this->input->post('extStreetNumber');
            $vendor['inStreetNumber'] = $this->input->post('inStreetNumber');
            $vendor['complementaryInfo'] = $this->input->post('complementaryInfo');
            $vendor['city'] = $this->input->post('city');
            $vendor['state'] = $this->input->post('state');
            $vendor['zipcode'] = $this->input->post('zipcode');
            $vendor['country'] = $this->input->post('country');
            $vendor['phoneNumber'] = $this->input->post('phonenumber');
            $vendor['mail'] = $this->input->post('mail');

			$msg = $this->vendor->vendor_edit($vid, $vendor);
			if ($msg) {
				$vendors = $this->vendor->get_vendor_list();
                $i = 0;
                $html = '';
                foreach($vendors as $v) {
                    $s = '';
                    if($v['state'] == 1){
                        $s = 'accept';
                    }
                    else {
                        $s = 'close';
                    }
                    $i++;
                    $html .="<tr id='tr_".$v['vid']."'>";
                    $html .="<td>".$i."</td>";
                    $html .= "<td>".$v['name']."</td>";
                    $html .= "<td>".$v['street']."</td>";
                    $html .= "<td>".$v['extStreetNumber']."</td>";
                    $html .= "<td>".$v['inStreetNumber']."</td>";
                    $html .= "<td>".$v['complementaryInfo']."</td>";
                    $html .= "<td>".$v['city']."</td>";
                    $html .= "<td>".$v['zipcode']."</td>";
                    $html .= "<td>".$v['country']."</td>";
                    $html .= "<td>".$v['phoneNumber']."</td>";
                    $html .= "<td>".$v['mail']."</td>";
                    $html .= "<td>".$s."</td>";
                    $html .= "<td><a href='javascript:edit_vendor_modal(".$v['vid'].")'>Edit</a></td>";
                    $html .= "<td><a href='javascript:confirm_delete(".$v['vid'].")'>Delete</a></td>";
                    $html .= '</tr>';
                }
                echo json_encode($html);
			}
		}
	}

	public function vendor_search() {
		$key = $this->input->post('srch_key');
		$res = $this->vendor->search_result($key);
        $i = 0;
        $html = '';
        foreach($res as $v) {
            if($v['state'] == 1){
                $s = 'accept';
            }
            else {
                $s = 'close';
            }
            $i++;
            $html .="<tr id='tr_".$v['vid']."'>";
            $html .="<td>".$i."</td>";
            $html .= "<td>".$v['name']."</td>";
            $html .= "<td>".$v['street']."</td>";
            $html .= "<td>".$v['extStreetNumber']."</td>";
            $html .= "<td>".$v['inStreetNumber']."</td>";
            $html .= "<td>".$v['complementaryInfo']."</td>";
            $html .= "<td>".$v['city']."</td>";
            $html .= "<td>".$v['zipcode']."</td>";
            $html .= "<td>".$v['country']."</td>";
            $html .= "<td>".$v['phoneNumber']."</td>";
            $html .= "<td>".$v['mail']."</td>";
            $html .= "<td>".$s."</td>";
            $html .= "<td><a href='javascript:edit_vendor_modal(".$v['vid'].")'>Edit</a></td>";
            $html .= "<td><a href='javascript:confirm_delete(".$v['vid'].")'>Delete</a></td>";
            $html .= '</tr>';
        }
		echo json_encode($html);
	}

	public function del_vendor() {
	    //var_dump($_POST);exit;
		$vid = $this->input->post('vid');
		$msg = $this->vendor->delete_vendor($vid);
        $vendor = $this->vendor->get_list();
        $i = 0;
        $html = '';
        foreach($vendor as $v) {
            if($v['state'] == 1){
                $s = 'accept';
            }
            else {
                $s = 'close';
            }
            $i++;
            $html .="<tr id='tr_".$v['vid']."'>";
            $html .="<td>".$i."</td>";
            $html .= "<td>".$v['name']."</td>";
            $html .= "<td>".$v['street']."</td>";
            $html .= "<td>".$v['extStreetNumber']."</td>";
            $html .= "<td>".$v['inStreetNumber']."</td>";
            $html .= "<td>".$v['complementaryInfo']."</td>";
            $html .= "<td>".$v['city']."</td>";
            $html .= "<td>".$v['zipcode']."</td>";
            $html .= "<td>".$v['country']."</td>";
            $html .= "<td>".$v['phoneNumber']."</td>";
            $html .= "<td>".$v['mail']."</td>";
            $html .= "<td>".$s."</td>";
            $html .= "<td><a href='javascript:edit_vendor_modal(".$v['vid'].")'>Edit</a></td>";
            $html .= "<td><a href='javascript:confirm_delete(".$v['vid'].")'>Delete</a></td>";
            $html .= '</tr>';
        }
        $data = array(
            'msg' => $msg,
            'html' => $html,
        );
		echo json_encode($data);
	}
}







