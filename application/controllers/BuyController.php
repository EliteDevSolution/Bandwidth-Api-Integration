<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuyController extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('BuyChitModel','buychit');
        $this->load->model('WarehouseModel','warehouse');
	}
	public function index()
	{
	    $buydata = $this->buychit->get_Buy();
        $data = array(
            "subtitle" => "Compras",
            "description" => "Total",
            "contentview" => "/buy/buychit",
            "buydata" => $buydata
        );
        $this->load->view('layout', $data);
	}
	public function buyproduct()
    {
        $warehouse = $this->warehouse->get_warehousebyuserid();

        $user = $this->session->userdata('user');
        $userdata = $this->db->query("select id,name,email from user where email = '".$user['email']."' group by email");
        $maxchitnum = $this->db->query("select max(chitNum)+1 as chitnum from buy_chit ");
        $vendor = $this->db->query("select vid,name from vendor ");
        $data = array(
            "subtitle" => "Compras",
            "description" => "Edit",
            "contentview" => "/buy/buyproduct",
            "warehouse" => $warehouse,
            "userdata" => $userdata->result_array(),
            "chitnum" => $maxchitnum->result_array(),
            "vendor" => $vendor->result_array()

        );
        $this->load->view('layout',$data);
    }
    public function productlist()
    {
        $productlist = $this->db->query('select id,code,name,buyprice from products');
        echo json_encode($productlist->result_array());
    }
}
