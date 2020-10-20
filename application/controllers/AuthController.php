<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('UserModel','user');
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->lang->load('auth', $this->config->item("language"));
	}
	public function index()
	{
		//$user_id    = getenv("BANDWIDTH_USER_ID");
        //$api_token  = getenv("BANDWIDTH_API_TOKEN");
        //$api_secret = getenv("BANDWIDTH_API_SECRET");
        //var_dump($user_id);
        //$this->load->library('sendmessagelib');
        $this->load->view('auth/login');
	}

    function callback()
    {
       //header("Access-Control-Allow-Origin: *");
       //header('Content-Type: application/json');
       //$data = array('msg'=>'success');
       // return json_encode($data);
        $json =$this->input->raw_input_stream;
        $json =  str_replace('{', '', $json);
        $json = str_replace('}', '', $json);
        $json = str_replace('"', '', $json);
        $json = explode(',', $json);        
        $text = $json;

        $data = array();
       //file_put_contents("./" . date("Y-m-d h:i:s") . "TESTING.log", $json);
        $this->user->savepostdata($json, $text);
    }

    function isMessageReceive()
    {
        $val = $this->user->getmsgstate();
        if($val == '1')
        {
            echo 'ok';
            $this->user->replacemsgstate();
            exit;
        } else
        {
            echo 'no';
        }
    }
	
    public function login()
	{
        $this->load->view('auth/login');
	}
	
	public function register()
	{
		$this->load->view('auth/register');
	}
	
	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect(base_url() . 'login', 'location');
	}

	public function login_action()
    {
        $login_user['username'] = $this->input->post('username');
        $login_user['password'] = $this->input->post('password');
        $result = $this->user->login_user($login_user);
        if($result == true)
        {
			$myphonenumber = $this->user->get_myphonenumber($this->input->post('username'));
            $this->session->set_userdata('user', $login_user);
            $this->session->set_userdata('myphonenumber', $myphonenumber);
            $data = array('msg'=>'success');
            echo json_encode($data);
        }
        else{
            $data = array('msg'=>'failed');
            echo json_encode($data);
        }
    }
	
	public function user_add()
    {
        $new_user['name'] = $this->input->post('firstname').' '.$this->input->post('lastname');
        $new_user['email'] = $this->input->post('email');
        $new_user['password'] = $this->input->post('password');
        $new_user['phone'] = $this->input->post('phone');
        $new_user['createdAt'] = date("Y-m-d h:i:s");
        $this->form_validation->set_rules("firstname", "Please enter name.", "required");       
        $this->form_validation->set_rules("email", "Please enter correctly email address.", 'required|valid_email|is_unique[user.email]');       
        $this->form_validation->set_rules("password", "Please enter password.", "required");       
        $this->form_validation->set_rules("phone", "Please enter phone number.", "numeric");       

        if ($this->form_validation->run() == FALSE)
        {
            $data = array('msg' => 'failed');
            echo json_encode($data);
        } else
        {
            $result = $this->user->user_add($new_user);
            if($result == true)
            {
                $data = array('msg'=>'success');
                echo json_encode($data);
            }else {
                $data = array('msg' => 'failed');
                echo json_encode($data);

            }
        }
    }

}
