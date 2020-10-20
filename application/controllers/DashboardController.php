<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		if($this->session->userdata("user")["password"] == "")
			redirect(base_url() . 'login', 'location');
		$data = array(
			"subtitle" => "Notice",
			"description" => "My Site is for BandWidth's Manager",
			"contentview" => "dashboard/index",
		);
		$this->load->view('layout', $data);	
	}
}
