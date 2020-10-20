<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * [Controller for Products]
 */
class ProductController extends CI_Controller
{

	var $form_config = array(
		array(
			'field' => 'name',
			'label' => 'Product Name',
			'rules' => 'required'
		),
		array(
			'field' => 'code',
			'label' => 'Product Code',
			'rules' => 'required|min_length[4]|max_length[4]'
		),
		array(
			'field' => 'category',
			'label' => 'Product Category',
			'rules' => 'required'
		),
		array(
			'field' => 'buyprice',
			'label' => 'Product BuyPrice',
			'rules' => 'required'
		),
		array(
			'field' => 'sellprice',
			'label' => 'Product SellPrice',
			'rules' => 'required'
		),
	);
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('ProductModel', 'product');
	}

	public function index() {
		$products = $this->product->get_products_list();
		$data = array(
			"subtitle" => "Productos",
			"description" => "",
			"contentview" => "products/list",
			"products" => $products
		);
		$this->load->view('layout', $data);
	}

	public function add_product() {
		$this->form_validation->set_rules($this->form_config);
		if ($this->form_validation->run() != FALSE) {
			$new_product['name'] = $this->input->post('name');
			$new_product['code'] = $this->input->post('code');
			$new_product['family'] = $this->input->post('category');
			$new_product['description'] = $this->input->post('description');
			$new_product['buyPrice'] = $this->input->post('buyprice');
			$new_product['sellPrice'] = $this->input->post('sellprice');
			$msg = $this->product->product_add($new_product);
			if ($msg === 'already_exist') {
				echo json_encode($msg);
				return;
			}
			else {
				$data['products'] = $this->product->get_products_list();
				$html = $this->load->view('products/table', $data, true);
				echo json_encode($html);
				return;
			}
		}

		echo json_encode('form_validation_error');
		return;
	}

	public function edit_product() {
		$this->form_validation->set_rules($this->form_config);
		if ($this->form_validation->run() != FALSE) {
			$edit_id = $this->input->post('e_id');
			$new_product['name'] = $this->input->post('name');
			$new_product['code'] = $this->input->post('code');
			$new_product['family'] = $this->input->post('category');
			$new_product['description'] = $this->input->post('description');
			$new_product['buyPrice'] = $this->input->post('buyprice');
			$new_product['sellPrice'] = $this->input->post('sellprice');
			$msg = $this->product->product_edit($edit_id, $new_product);
			if ($msg) {
				$data['products'] = $this->product->get_products_list();
				$html = $this->load->view('products/table', $data, true);
				echo json_encode($html);
			}
		}
	}

	public function product_search() {
		$key = $this->input->post('srch_key');
		$data['products'] = $this->product->search_result($key);
		$html = $this->load->view('products/table', $data, true);
		echo json_encode($html);

	}

	public function del_product() {
		$p_id = $this->input->post('del_id');
		$msg = $this->product->delete_product($p_id);
		echo json_encode($msg);
	}
}